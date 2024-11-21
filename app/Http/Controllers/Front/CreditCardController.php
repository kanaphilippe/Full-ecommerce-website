<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Http\Discovery\Exception\NotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductsAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CreditCardController extends Controller
{
   public function creditCard(){
        $getCartItems = getCartItems();
        if(Session::has('order_id')){
            $orderDetails = Order::with('orders_products', 'user')->where('id', Session::get('order_id'))->first()->toArray();
            // Empty the user Cart
            // Cart::where('user_id', Auth::user()->id)->delete();
            // Session::forget('couponAmount');
            // Session::forget('couponCode');
            return view('front.creditcard.creditCard');
        }else{
            return redirect('/cart');
        }
    }

    public function pays(Request $request){
         Session::get('grand_total');
            $orderDetails = Order::with('orders_products', 'user')->where('id', Session::get('order_id'))->first()->toArray();
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        $getCartItems = getCartItems();
        $data = $request->all();
        $lineItems = [];
        $total_price = 0;

        foreach ($getCartItems as $item){
             $getAttributePrice = Product::getAttributePrice($item['product_id'],$item['product_size']);
             $total_price = $total_price + ($getAttributePrice['final_price']*$item['product_qty']);
            $grand_total = $total_price;
            $getCartItems = getCartItems();
              Session::get('grand_total');
            Session::get('order_id');
            $lineItems[] = [
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                'name' =>  $item['product']['product_name'] ,
                //'images' => [asset('front/images/products/small/'.$item['product']['images'][0]['image'])],
                ],
                'unit_amount' => $getAttributePrice['final_price'] * 100,
            ],
            'quantity' => 1,

            ];
        }

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('pays.success',[], true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('pays.error',[], true),
            ]);

        $order = new Order();

            return redirect($checkout_session->url);
    }

    public function success(Request $request){
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        try{
            //$session = $stripe->checkout->sessions->retrieve($request->session_id);
        /*if(!$session){
                abort(404, 'Link do not Exist');
        }*/
        $orderDetails = Order::with('orders_products', 'user')->where('id', Session::get('order_id'))->first()->toArray();
        $sessionId = $request->get('session_id');

        // Get the order ID
        $order_id = Session::get('order_id');
        // Update the order status to 'payement Capture'
        Order::where('id', $order_id)->update(['order_status' => 'Payment Captured']);
        // Update the order status to 'paid'
        Order::where('id', $order_id)->update(['order_status' => 'Payment Captured']);

        $orderDetails = Order::with('orders_products','user')->where('id', $order_id)->first()->toArray();

        foreach ($orderDetails['orders_products'] as $key => $item) {
            // Reduce Stock Script Start
            $getProductstock = ProductsAttribute::productStock($item['product_id'], $item['product_size']);
            $newStock = $getProductstock - $item['product_qty'];
            ProductsAttribute::where(['product_id' => $item['product_id'], 'size' => $item['product_size']])->update(['stock'=>$newStock]);
        }

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
                
                // Empty The User Cart
                Cart::where('user_id', Auth::user()->id)->delete();

        return view('front.creditcard.success', compact('orderDetails'));
        if(!$order_id){
            abort(404, 'Order not found');
        }

        }catch(\Exception $e){
            abort(404, 'Link do not Exist');
        }
        
        

    }

    public function errorses(){

    }
    
}
