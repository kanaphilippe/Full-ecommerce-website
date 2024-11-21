<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Rating;
use App\Models\Order;
use App\Models\User;
use App\Models\ShippingCharge;
use Illuminate\Support\Facades\Mail;
use App\Models\DeliveryAddress;
use App\Models\OrdersProduct;
use App\Models\ProductsAttribute;
use App\Models\ProductsFilters;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    public function listing(Request $request){
       $url = Route::getFacadeRoot()->current()->uri;
       $categoryCount = Category::where(['url' => $url,'status' => 1])->count();
       if($categoryCount > 0){
           // echo "Category Exists";

           // Get Category Details
            $categoryDetails = Category::categoryDetails($url);
           // dd($categoryDetails);

            // Get Category and their Sub Category Products
            $categoryProducts = Product::with(['brand','images'])->whereIn('category_id',$categoryDetails['catIds'])->where('products.status', 1);

            // Update Querry for Product Sorting
           /* if(isset($request['sort'])&&!empty($request['sort'])){
                if($request['sort']=="product_latest"){
                    $categoryProducts->orderBy('id','Desc');
                }else if($request['sort']=="lowest_price"){
                    $categoryProducts->orderBy('final_price','ASC');
                }else if($request['sort']=="highest_price"){
                    $categoryProducts->orderBy('final_price','DESC');
                }else if($request['sort']=="best_selling"){
                    $categoryProducts->where('is_bestseller','Yes');
                }else if($request['sort']=="featured_items"){
                    $categoryProducts->where('is_featured','Yes');
                }else if($request['sort']=="discounted_items"){
                    $categoryProducts->where('product_discount','>',0);
                }else{
                    $categoryProducts->orderBy('products.id','Desc');
                }
            } */ 

            // Update Querry for Color Filter
            if (isset($request['color']) && !empty($request['color'])) {
                $colors = explode('~', $request['color']); 
                $categoryProducts->whereIn('products.family_color', $colors);
            }

            // Update Querry for sizes Filter
            if (isset($request['size'])&&!empty($request['size'])) {
                $sizes = explode('~',$request['size']);
                $categoryProducts->join('products_attributes','products_attributes.product_id','=','products.id')->whereIn('products_attributes.size',$sizes)->groupBy('products_attributes.product_id');
            }

            // Update Querry for Brands
             if (isset($request['brand'])&&!empty($request['brand'])) {
                $brands = explode('~',$request['brand']);
                $categoryProducts->whereIn('products.brand_id', $brands);
            }

            // Update Querry for Price
            if (isset($request['price'])&&!empty($request['price'])) {
                $request['price'] = str_replace("~", "-", $request['price']);
                $prices = explode('-',$request['price']);
                $count = count($prices);
                // $categoryProducts->('final_price',[$prices[0],$prices[1]]); 
                $categoryProducts->whereBetween('products.final_price',[$prices[0],$prices[$count-1]]);
            }

            //  Update Query for Danamic Filters
            $filterTypes = ProductsFilters::filterTypes();
            foreach ($filterTypes as $key => $filter) {
                if($request->$filter){
                    $explodeFilterVals = explode('~', $request->$filter);
                    $categoryProducts->whereIn($filter, $explodeFilterVals);
                }
            }

            $categoryProducts = $categoryProducts->paginate(6);
            if($request->ajax()){
                return response()->json([
                    'view'=>(String)View::make('front.products.ajax_products_listing')->with(compact('categoryDetails','categoryProducts','url'))
                ]);
            }else{
                 return view('front.products.listing')->with(compact('categoryDetails','categoryProducts','url'));
            }
            // dd($categoryProducts);
            
       }else if(isset($_GET['query']) && !empty($_GET['query'])){
          $search = $_GET['query'];

    // Get Search Query Products
            $categoryProducts = Product::with(['brand', 'images'])->where(function ($query) use ($search) {
                $query->where('product_name', 'like', '%' . $search . '%')
                    ->orWhere('product_code', 'like', '%' . $search . '%')
                    ->orWhere('product_color', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
    })->where('status', 1);
    
    $categoryProducts = $categoryProducts->get();
    
    // dd($categoryProducts);
    
    return view('front.products.search')->with(compact('categoryProducts','url'));
}else{
            abort(404);
       }

    }

    public function detail($id){
        $productCount = Product::where('status', 1)->where('id', $id)->count();
        if ($productCount == 0) {
            abort(404);
        }
        $productDetails = Product::with([
            'category',
            'brand',
            'attributes' => function ($query) {
                $query->where('stock', '>', 0)->where('status', 1);
        },'images'])->find($id)->toArray();
        //dd($productDetails);
        // Get Category Details
            $categoryDetails = Category::categoryDetails($productDetails['category']['url']);

            // Get group Products (Products Colors)
        $groupProducts = array();
        if(!empty($productDetails['group_code'])){
            $groupProducts = Product::select('id', 'product_color')->where('id', '!=', $id)->where(['group_code' => $productDetails['group_code'], 'status' => 1])->get()->toArray();
            // dd($groupProducts);
        }

        // Get Related Products
        $relatedProducts = Product::with('brand', 'images')->where('category_id', $productDetails['category']['id'])->where('id', '!=', $id)->limit(6)->inRandomOrder()->get()->toArray();
        //dd($relatedProducts);

        // Set Session for Recently Viewed Items
        if (empty(Session::get('session_id'))) {
            $session_id = md5(uniqid(rand(), true));
        }else {
            $session_id = Session::get('session_id');
        }
        Session::put('session_id', $session_id);

        // Insert Product In Recently viewed table if not alredy exists
        $countRecentlyViewedItems = DB::table('recently_viewed_items')->where(['product_id' => $id, 'session_id' => $session_id])->count();
        if ($countRecentlyViewedItems == 0) {
            DB::table('recently_viewed_items')->insert(['product_id' => $id, 'session_id' => $session_id]);
        }

        // Get All Ratings of product
        $ratings = 0;
        $ratings = Rating::with('user')->where(['product_id' => $id, 'status' => 1])->get()->toArray();
        // dd($ratings);
        // Get Average Rating of Product
        $ratingSum = Rating::where(['product_id' => $id, 'status' => 1])->sum('rating');
        $ratingCount = Rating::where(['product_id' => $id, 'status' => 1])->count();
        $avgRating = 0;
        $avgStarRating = 0;
        if($ratingCount>0){
            $avgRating = round($ratingSum / $ratingCount, 2);
            $avgStarRating = round($ratingSum / $ratingCount);
        }
        
        // Get Recently Viewed Product Ids
        $recentlyProductIds = DB::table('recently_viewed_items')->select('product_id')->where('product_id', '!=', $id)->where('session_id', $session_id)->inRandomOrder()->get()->take(6)->pluck('product_id');
        //dd($recentlyProductIds);

        // Get Recently Viewed Product
        $recentlyViewedProducts = Product::with('brand', 'images')->whereIn('id', $recentlyProductIds)->get()->toArray();
        // dd($recentlyViewedProducts);

        return view('front.products.detail')->with(compact('productDetails','categoryDetails','groupProducts','relatedProducts','recentlyViewedProducts','ratings','avgRating','avgStarRating'));
    } 

    public function getAttributePrice(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die; 
            
            $getAttributePrice = Product::getAttributePrice($data['product_id'],$data['size']);
             // echo "<pre>"; print_r($getAttributePrice); die;
            return $getAttributePrice;
             
        }
    }

    public function addToCart(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // Forget the Coupon Sessions
            Session::forget('couponAmount');
            Session::forget('couponCode');

            // Check Product Stock
            $productStock = ProductsAttribute::productStock($data['product_id'],$data['size']);
            if ($data['qty'] > $productStock) {
                $message = "Sorry Your Required Quantity Is Not Available !";
                return response()->json(['status' => false, 'message' => $message]);
            }
            // Check Product Status
            $productStatus = Product::productStatus($data['product_id']);
            if ($productStatus == 0) {
                $message = "Sorry Your Required Product Is Not Available !";
                return response()->json(['status' => false, 'message' => $message]);
            }

            // Generate Session Id If Not Exists
            //$session_id = Session::get('session_id');
            if (empty(Session::get('session_id'))) {
                $session_id = Session::getId();
                Session::put('session_id', $session_id);
            }else{
                $session_id = Session::get('session_id');
            }

            // echo $session_id; die;

            // Check Product If Alredy Exists In The User Cart
            if(Auth::check()){
                // $user_id = Auth::user()->id;
                // User is logged in
                $user_id = Auth::user()->id;
                $countProducts = Cart::where(['product_id' => $data['product_id'], 'product_size' => $data['size'], 'user_id' => $user_id])->count();
            }else{
                // User is Not Logged In
                // $user_id = Session::get('session_id');
                $user_id = 0;
                $countProducts = Cart::where(['product_id' => $data['product_id'], 'product_size' => $data['size'], 'session_id' => $session_id])->count();
            }
            if ($countProducts > 0) {
                $message = "Product Already Exists In Your Cart !";
                return response()->json(['status' => false, 'message' => $message]);
            }

            // Save The Product In Cart Table
            $item = new Cart();
            $item->session_id = $session_id;
            if (Auth::check()) {
                $item->user_id = Auth::user()->id; 
            }
            $item->product_id = $data['product_id'];
            $item->product_size = $data['size'];
            $item->product_qty = $data['qty'];
            $item->save();
            // Get Total Cart Items
           $totalCartItems = totalCartItems();
            $getCartItems = getCartItems();
            $message = "Product Added Successfully In Your Cart !";
            return response()->json([
                'status' => true, 
                'message' => $message,
                'totalCartItems'=>$totalCartItems,
                'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
            ]);
        }
    }

    public function cart(){
        $getCartItems = getCartItems();
        // dd($getCartItems);
        return view('front.products.cart')->with(compact('getCartItems'));
    }
    public function updateCartItemQty(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            // Forget the Coupon Sessions
            Session::forget('couponAmount');
            Session::forget('couponCode');

            // Get Cart Details
            $cartDetails = Cart::find($data['cartid']);

            // Get Available Products
            $availableStock = ProductsAttribute::select('stock')->where(['product_id' => $cartDetails['product_id'], 'size' => $cartDetails['product_size']])->first()->toArray();
            // echo "<pre>"; print_r($availableStock); die;

            // Check if Desired Stock From user is Available
            if ($data['qty'] > $availableStock['stock']) {
                $getCartItems = getCartItems();
                return response()->json([
                'status' => false,
                'message' => 'Sorry, Desired Stock is Not Available !',
                'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
               ]);
            }

            // Check if Product Size Is Available
            $checkProductSize = ProductsAttribute::where(['product_id' => $cartDetails['product_id'], 'size' => $cartDetails['product_size'],'status'=>1])->count();
            if ($checkProductSize == 0) {
                $getCartItems = getCartItems();
                return response()->json([
                'status' => false,
                'message' => 'Sorry, Desired Size is Not Available. Please Choose Another Product !',
                'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
               ]);
            }

            // Update the Cart Quantity
            Cart::where('id', $data['cartid'])->update(['product_qty' => $data['qty']]);

            // Get Updated Cart Items
            $getCartItems = getCartItems();
           // dd($getCartItems);

           // Get Total Cart Items
           $totalCartItems = totalCartItems();
            $getCartItems = getCartItems();
           // dd($totalCartItems);

           // Return the Updated Cart Items via Ajax
            return response()->json([
                'status' => true,
                'totalCartItems' => $totalCartItems,
                'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
               ]);
        }
    }
    public function deleteCartItem(Request $request){
        if ($request->ajax()) {
            $data = $request->all();

            // Forget the Coupon Sessions
            Session::forget('couponAmount');
            Session::forget('couponCode');

            // echo "<pre>"; print_r($data); die;
            Cart::where('id', $data['cartid'])->delete();
            // Get Updated Cart Item
            $getCartItems = getCartItems();
            // Get Total Cart Items
           $totalCartItems = totalCartItems();
            // Return Updated Cart Via Ajax
            return response()->json([
                'status' => true,
                'totalCartItems' => $totalCartItems,
                'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
            ]);
        }
    }

    /*public function emptyCart(Request $request){
        if ($request->ajax()) {
            // Empty Cart
            emptyCart();
            // Get Updated Cart Item
            $getCartItems = getCartItems();
            // Get Total Cart Items
           $totalCartItems = totalCartItems();
            // Return Updated Cart Via Ajax
            return response()->json([
                'status' => true,
                'totalCartItems' => $totalCartItems,
                'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
            ]);
        }
    }*/

    public function applyCoupon(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            // Get Updated Cart Item
            $getCartItems = getCartItems();
            // Get Total Cart Items
           $totalCartItems = totalCartItems();

           // Verify Coupon is Valide Or Not
           $couponCount = Coupon::where('coupon_code', $data['code'])->count();
            if ($couponCount == 0){
                return response()->json([
                    'status' => false,
                    'totalCartIterms'=>$totalCartItems,
                    'message' => 'Your Coupon is not valid!',
                    'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                    'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                ]);
            }else{
                // Check for Other Coupon Condition
               // echo "valide Coupon"; die;

               // Get Coupons Details
               $couponDetails = Coupon::where('coupon_code', $data['code'])->first();

               // if Coupon is Inactive
                if ($couponDetails->status == 0) {
                    $error_message = "Sorry The Coupon Code You Are Trying To Use Is Not Active";
                }

                // If Coupon Is expired
                $expiry_date = $couponDetails->expiry_date;
                $current_date = date('Y-m-d');
                if ($expiry_date < $current_date) {
                    $error_message = "Sorry The Coupon Code You Are Trying To Use Is Expired";
                }

                // Check if Coupon is for Single or Multiple Time
                if ($couponDetails->coupon_type == "Single Time") {
                    // Check in orders if Coupon is Alredy Used by The User
                    $couponCount = Order::where(['coupon_code' => $data['code'], 'user_id' => Auth::user()->id])->count();
                    if($couponCount>=1){
                        $error_message = "Sorry You Have Alredy Used This Coupon, It Can't More Use! ";
                    }
                }

                // Get all Selected Categories from Coupon
                $catArr = explode(",", $couponDetails->categories);
                // Get all Selected Brands from Coupon
                $brandsArr = explode(",", $couponDetails->brands);
                // Get all Selected Users from Coupon
                $usersArr = explode(",", $couponDetails->users);

                foreach ($usersArr as $key => $user){
                    $getUserID = User::select('id')->where('email', $user)->first()->toArray();
                    $usersID[] = $getUserID['id'];
                }

                // check if any cart item does not belong to coupon category, brand user
                $total_amount = 0;
                foreach ($getCartItems as $key => $item) {
                    // // check if any cart item does not belong to coupon category
                    if (!in_array($item['product']['category_id'],$catArr)){
                        $error_message = "Sorry The Coupon Code You Are Trying To Use Is Not Applicable For This Productcs!";
                    }
                    // check if any cart item does not belong to coupon brand
                    if (!in_array($item['product']['brand_id'],$brandsArr)){
                        $error_message = "Sorry The Coupon Code You Are Trying To Use Is Not Applicable For This Productcs!";
                    }
                    // check if any cart item does not belong to coupon user
                    if(count($usersArr)>0){
                        if (!in_array($item['user_id'],$usersID)){
                        $error_message = "Sorry The Coupon Code You Are Trying To Use Is Not Applicable For You!";
                        }
                    }

                    $getAttributePrice = Product::getAttributePrice($item['product_id'], $item['product_size']);

                    $total_amount = $total_amount + ($getAttributePrice['final_price'] * $item['product_qty']);
                }

                // if Error Message is There
                if(isset($error_message)){
                    return response()->json([
                    'status' => false,
                    'totalCartIterms'=>$totalCartItems,
                    'message' => $error_message,
                    'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                    'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                    ]);
                }else{
                    // Apply Coupon if coupon code is correct

                    // Check if Coupon Amount type is Fixed or Percentage
                    if ($couponDetails->amount_type == 'Fixed') {
                        $couponAmount = $couponDetails->amount;
                    }else{
                        $couponAmount = $total_amount * ($couponDetails->amount / 100);
                    }

                    $grand_total = $total_amount - $couponAmount;

                    // Add Coupon Code & Amount in Session Variables
                    Session::put('couponAmount', $couponAmount);
                    Session::put('couponCode', $data['code']);

                    $message = "Your Coupon Code Has Been Successfully Applied. Your Cart Has Been Discounted!";

                    return response()->json([
                    'status' => true,
                    'totalCartIterms'=>$totalCartItems,
                    'couponAmount'=>$couponAmount,
                    'grandTotal'=>$grand_total,
                    'message' => $message,
                    'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                    'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                    ]);

                }

                

            }
        }
    }

    public function checkout(Request $request){
        
        
        // Get User Cart Items
        $getCartItems = getCartItems();
        $total_price = 0;
            $shipping_charges = 0;
            $total_weight = 0;
            foreach($getCartItems as $item){
                $getAttributePrice = Product::getAttributePrice($item['product_id'], $item['product_size']);
                $total_price = $total_price + ($getAttributePrice['final_price'] * $item['product_qty']);
                $product_weight = $item['product']['product_weight'];
                $total_weight = $total_weight + $product_weight;
            }
            if(count($getCartItems)==0){
            $message = "Sorry Your Shopping Cart is Empty! Please Add Products To Checkout";
            return redirect('cart')->with('error_message', $message);
        }

        // Get User Delivery Addresses
        $deliveryAddresses = DeliveryAddress::deliveryAddresses();
        
        // Get All Countries
        $countries = Country::where('status', 1)->get()->toArray();

        /*if(count($getCartItems)==0){
            $message = "Sorry Your Shopping Cart is Empty! Please Add Products To Checkout";
            return redirect('cart')->with('error_message', $message);
        }

        // Get User Delivery Addresses
        $deliveryAddresses = DeliveryAddress::deliveryAddresses();
        
        // Get All Countries
        $countries = Country::where('status', 1)->get()->toArray();*/

        // Get Shipping Charges from default delivery Country of the user
        $shipping_charges = 0;
        $addressCount = DeliveryAddress::where(['user_id' => Auth::user()->id, 'is_default' => 1, 'status' => 1])->count();
        if ($addressCount > 0) {
            $defaultDeliveryAddress = DeliveryAddress::where(['user_id' => Auth::user()->id, 'is_default' => 1, 'status' => 1])->first()->toArray();
            $shipping_charges = ShippingCharge::getShippingCharges($total_weight,$defaultDeliveryAddress['country']);
        }

        if($request->isMethod('post')){
            $data = $request->all();
            // print_r($data); die;

            // Check For Delivery Address
            $deliveryAddressCount = DeliveryAddress::where('user_id', Auth::user()->id)->count();
            if ($deliveryAddressCount == 0) {
                return redirect()->back()->with('error_message', 'Please Add A Delivery Address');
            } 

            // Check For Payment Method
            if(empty($data['payment_gateway'])){
                return redirect()->back()->with('error_message', 'Please Select A Payment Method');
            }

            // Agree To The Terms And Conditions
            if(!isset($data['agree'])){
                return redirect()->back()->with('error_message', 'Please Agree To The Terms And Conditions');
            }

            // Check For Default Delivery Address
            $deliveryAddressDefaultCount = DeliveryAddress::where('user_id', Auth::user()->id)->where('is_default',1)->count();
            if ($deliveryAddressDefaultCount == 0) {
                return redirect()->back()->with('error_message', 'Please Select Your Delivery Address');
            }else{
                $deliveryAddress = DeliveryAddress::where('user_id', Auth::user()->id)->where('is_default',1)->first()->toArray();
                // dd($deliveryAddress);
            }

            // Set Payment Method As COD and Order Status as New if COD is Selected from user otherwise
            // Set Payment Method as Prepaid As Prepaid and Order Status as Pending if COD is Selected

            if($data['payment_gateway']=="COD"){
                $payment_method = "COD";
                $order_status = "New";
            }else{
                $payment_method = "Prepaid";
                $order_status = "Pending";  
            }

            DB::beginTransaction();

            // Fetch Order Total Price
            /*$total_price = 0;
            $shipping_charges = 0;
            $total_weight = 0;
            foreach($getCartItems as $item){
                $getAttributePrice = Product::getAttributePrice($item['product_id'], $item['product_size']);
                $total_price = $total_price + ($getAttributePrice['final_price'] * $item['product_qty']);
                $product_weight = $item['product']['product_weight'];
                $total_weight = $total_weight + $product_weight;
            }*/

            // Get Shipping Charges
            $shipping_charges = 0;
            $total_weight = 0;
            $shipping_charges = ShippingCharge::getShippingCharges($total_weight,$deliveryAddress['country']);

            // Calculate Grand Total
            $grand_total = $total_price + $shipping_charges - Session::get('couponAmount');

            // Insert Grand Total In Session Variable
            Session::put('grand_total', $grand_total);

            // Insert Order Details
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->name = $deliveryAddress['name'];
            $order->address = $deliveryAddress['address'];
            $order->city = $deliveryAddress['city'];
            $order->state = $deliveryAddress['state'];
            $order->country = $deliveryAddress['country'];
            $order->pincode = $deliveryAddress['pincode'];
            $order->mobile = $deliveryAddress['mobile'];
            $order->shipping_charges = $shipping_charges;
            $order->coupon_code = Session::get('couponCode');
            $order->coupon_amount = Session::get('couponAmount');
            $order->order_status = $order_status;
            $order->payment_method = $payment_method;
            $order->payment_gateway = $data['payment_gateway'];
            $order->grand_total = $grand_total;
            $order->save();
            $order_id = DB::getPdo()->lastInsertId();

            foreach($getCartItems as $key => $item){
                $getProductDetails = Product::getProductDetails($item['product_id']);
                $getAttributeDetails = Product::getAttributeDetails($item['product_id'],$item['product_size']);
                $getAttributePrice = Product::getAttributePrice($item['product_id'],$item['product_size']);
                $cartItem = new OrdersProduct();
                $cartItem->order_id = $order_id;
                $cartItem->user_id = Auth::user()->id;
                $cartItem->product_id = $item['product_id'];
                $cartItem->product_code = $getProductDetails['product_code'];
                $cartItem->product_name = $getProductDetails['product_name'];
                $cartItem->product_color = $getProductDetails['product_color'];
                $cartItem->product_size = $item['product_size']; 
                $cartItem->product_sku = $getAttributeDetails['sku'];
                $cartItem->product_price = $getAttributePrice['final_price'];
                $cartItem->product_qty = $item['product_qty'];
                $cartItem->save();

                if($data['payment_gateway']=="COD"){
                // Reduce Stock Script Start
                    $getProductstock = ProductsAttribute::productStock($item['product_id'], $item['product_size']);
                    $newStock = $getProductstock - $item['product_qty'];
                    ProductsAttribute::where(['product_id' => $item['product_id'], 'size' => $item['product_size']])->update(['stock'=>$newStock]);
                }

            }

            // Insert Order Id In Session Variable
            Session::put('order_id', $order_id);

            DB::commit();

            if($data['payment_gateway']=="COD"){

                $orderDetails = Order::with('orders_products','user')->where('id', $order_id)->first()->toArray();

                // Send Order Email
                $email = Auth::user()->email;
                $messageData = [
                    'email' => $email,
                    'name' => Auth::user()->name,
                    'order_id' => $order_id,
                    'orderDetails' => $orderDetails,
                ];
                Mail::send('emails.order', $messageData, function($message) use ($email){
                    $message->to($email)->subject('Order Confirmation - SAA MEYA');
                });

                return redirect('/thanks');
            }
            if ($data['payment_gateway'] == "Paypal") {
                // Paypal Redirect User to Paypal Page after saving Order
                return redirect('paypal');
            }else if($data['payment_gateway'] == "Credit Card"){
                // Stripe - Redirect user to Stripe Page after Saving Order
                return redirect('creditCard');
            }else{
                echo "Prepaid Method Coming Soon"; die;
            }


        }

        // Get Updated Cart Items
        $getCartItems = getCartItems(); 

        // Get Delivery Addresses
        $deliveryAddresses = DeliveryAddress::deliveryAddresses();
        // Get All Countries
        $countries = Country::where('status', 1)->get()->toArray();
        return view('front.products.checkout')->with(compact('getCartItems','deliveryAddresses','countries','shipping_charges'));
    }

    public function thanks(){
        if(Session::has('order_id')){
            // Empty the user Cart
            Cart::where('user_id', Auth::user()->id)->delete();
            Session::forget('couponAmount');
            Session::forget('couponCode');
            return view('front.orders.thanks');
        }else{
            return redirect('/cart');
        }
    }
}
