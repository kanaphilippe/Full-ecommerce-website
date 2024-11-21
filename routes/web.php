<?php

use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\AddressController;
use App\Models\Category;
use App\Models\CmsPage;

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('App\Http\Controllers\Front')->group(function(){
            Route::get('/',[IndexController::class,'index']);

    // Listing Category Routes
    $catUrls = Category::select('url')->where('status',1)->get()->pluck('url');
    //dd($catUrls);
    foreach($catUrls as $key => $url){
        Route::get($url,'ProductController@listing');
    }

    $cmsUrls = CmsPage::select('url')->where('status',1)->get()->pluck('url');
//dd($catUrls);
foreach($cmsUrls as $key => $url){
    Route::get($url,'CmsController@cmsPage');
}

    //  Product Detail Page
    Route::get('product/{id}', 'ProductController@detail');

    // Get Product Attribute Price
    Route::post('get-attribute-price', 'ProductController@getAttributePrice');

    // Add To Cart
    Route::post('/add-to-cart','ProductController@addToCart');

    // Shopping Cart 
    Route::get('cart', 'ProductController@cart');

    // Update Cart Quantity
    Route::post('update-cart-item-qty', 'ProductController@updateCartItemQty');

    // Delete Cart Item
    Route::post('delete-cart-item', 'ProductController@deleteCartItem');

    // Delete total Cart
    Route::post('empty-cart', 'ProductController@emptyCart');

    // User Login
    Route::match(['get','post'],'user/login','UserController@loginUser')->name('login');

    // User Register
    Route::match(['get','post'],'user/register','UserController@registerUser');

    // User Confirmation
    Route::match(['get','post'],'user/confirm/{code}','UserController@confirmAccount');

    // Search Products
    Route::get('search-products', 'ProductController@listing');

    // Contact Page
    Route::match(['GET', 'POST'], 'contact', 'CmsController@contact');

    // Newsletter
    Route::post('product/add-subscriber-email', 'NewsletterController@addSubscriber');

    // Add Rating/Review
    Route::post('add-rating', 'RatingController@addRating');

    Route::group(['middleware' => ['auth']], function () {
         // User Account
        Route::match(['get','post'],'user/account','UserController@account');

        // User Change Password
        Route::match(['get','post'],'user/update-password','UserController@updatePassword');

        // User Logout
        Route::get('user/logout','UserController@logoutUser');

        // Apply Coupon 
        Route::post('/apply-coupon','ProductController@applyCoupon');

        // Checkout
        Route::match(['get','post'],'/checkout','ProductController@checkout');

        // Save Delivery Address
                Route::post('save-delivery-address', 'AddressController@saveDeliveryAddress');
        //Route::post('/save-delivery-address', [AddressController::class, 'saveDeliveryAddress']);

        // Get Delivery Address
        Route::post('get-delivery-address','AddressController@getDeliveryAddress');

        // Revome Delivery Address
        Route::post('remove-delivery-address','AddressController@removeDeliveryAddress');

        // set Default Delivery Address
        Route::post('set-default-delivery-address','AddressController@setDefaultDeliveryAddress');

        // Order Thanks Page
        Route::get('/thanks','ProductController@thanks');

        // My Orders
        Route::get('/user/orders', 'OrderController@orders');

        // Order Details
        Route::get('/user/orders/{id}', 'OrderController@orderDetails');

        // Paypal 
        Route::get('/paypal', 'PaypalController@paypal');
        Route::post('pay', 'PaypalController@pay')->name('payment');
        Route::get('success', 'PaypalController@success');
        Route::get('error', 'PaypalController@error');

        // Credit Card
        Route::get('/creditCard', 'CreditCardController@creditCard');
        Route::post('pays', 'CreditCardController@pays')->name('payments');
        Route::get('success', 'CreditCardController@success')->name('pays.success');
        Route::get('error', 'CreditCardController@errorses')->name('pays.error');

    });
    // Forgot Password
    Route::match(['get','post'],'user/forgot-password','UserController@forgotPassword');

    // Reset Password
    Route::match(['get','post'],'user/reset-password/{code?}','UserController@resetPassword');

});

Route::get('download-order-pdf-invoice/{id}', 'App\Http\Controllers\Admin\OrderController@printPDFOrderInvoice');

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::match(['get','post'],'login','AdminController@login');


    Route::group(['middleware'=>['admin']],function(){
         Route::get('dashboard','AdminController@dashboard');
         Route::match(['get','post'],'update-password','AdminController@updatePassword');
         Route::match(['get','post'],'update-details','AdminController@updateDetails');
         Route::post('check-current-password','AdminController@checkCurrentPassword');
         Route::get('logout','AdminController@logout');

         // Display Cms Pages (CRUD - READ)
         Route::get('cms-pages','CmsController@index');
         Route::post('update-cms-page-status','CmsController@update');
         Route::match(['get','post'],'add-edit-cms-page/{id?}','CmsController@edit');
         Route::get('delete-cms-page/{id?}','CmsController@destroy');

         // Subadmins
         Route::get('subadmins','AdminController@subadmins');
         Route::post('update-subadmin-status','AdminController@updateSubadminStatus');
         Route::match(['get','post'],'add-edit-subadmin/{id?}','AdminController@addEditSubadmin');
         Route::get('delete-subadmin/{id?}','AdminController@deleteSubadmin');
         Route::match (['get', 'post'], 'update-role/{id}', 'AdminController@updateRole');

         // Categories
         Route::get('categories','CategoryController@categories');
         Route::post('update-category-status','CategoryController@updateCategoryStatus');
         Route::get('delete-category/{id?}','CategoryController@deleteCategory');
         Route::get('delete-category-image/{id?}','CategoryController@deleteCategoryImage');
         Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@addEditCategory');

         // Products 
        Route::get('products','ProductsController@products');
        Route::post('update-product-status','ProductsController@updateProductStatus');
        Route::get('delete-product/{id?}','ProductsController@deleteProduct');
        Route::match(['get','post'],'add-edit-product/{id?}','ProductsController@addEditProdct');

        // Product Images
        Route::get('delete-product-image/{id?}','ProductsController@deleteProductImage');

        // Product Video
        Route::get('delete-product-video/{id?}','ProductsController@deleteProductVideo');

        // Product Attributes
        Route::post('update-attribute-status','ProductsController@updateAttributeStatus');
        Route::get('delete-attribute/{id?}','ProductsController@deleteAttribute');

        // Brands
        Route::get('brands','BrandController@brands');
        Route::post('update-brand-status','BrandController@updateBrandStatus');
        Route::get('delete-brand/{id?}','BrandController@deleteBrand');
        Route::match(['get','post'],'add-edit-brand/{id?}','BrandController@addEditBrand');
        Route::get('delete-brand-image/{id?}','BrandController@deleteBrandImage');
        Route::get('delete-brand-logo/{id?}','BrandController@deleteBrandLogo');

        // Banners
        Route::get('banners','BannersController@banners');
        Route::post('update-banner-status','BannersController@updateBannerStatus');
        Route::get('delete-banner/{id?}','BannersController@deleteBanner');
        Route::match(['get','post'],'add-edit-banner/{id?}','BannersController@addEditBanner');

        // Coupons
        Route::get('coupons','CouponsController@coupons');
        Route::post('update-coupon-status','CouponsController@updateCouponStatus');
        Route::get('delete-coupon/{id?}','CouponsController@deleteCoupon');
        Route::match(['get','post'], 'add-edit-coupon/{id?}','CouponsController@addEditCoupon');

        // Users
        Route::get('users','UserController@users');
        Route::post('update-user-status','UserController@updateUserStatus');

        // View Oders
        Route::get('orders','OrderController@orders');

        // Order Detail
        Route::get('orders/{id}', 'OrderController@orderDetails');

        // Update Order Status
        Route::post('/update-order-status', 'OrderController@updateOrderStatus');

        // Print HTML Order Invoice
        Route::get('/print-order-invoice/{id}', 'OrderController@printOrderHTMLInvoice');

        // Print PDF Order Invoice
        Route::get('/print-pdf-order-invoice/{id}', 'OrderController@printPDFOrderInvoice');

        // Shipping Charges
        Route::get('shipping-charges','ShippingController@shippingCharges'); 
        Route::post('/update-shipping-status', 'ShippingController@updateShippingStatus');
        Route::match(['get', 'post'], 'edit-shipping-charges/{id?}', 'ShippingController@editShippingCharges');

        // Ratings
        Route::get('ratings','RatingController@ratings');
        Route::post('/update-rating-status', 'RatingController@updateRatingStatus');
        Route::get('delete-rating/{id?}','RatingController@deleteRating');

        // Newsletter Subscribers
        Route::get('subscribers','NewsletterController@subscribers');
        Route::post('update-subscriber-status', 'NewsletterController@updateSubscriberStatus');
        Route::get('delete-subscriber/{id?}','NewsletterController@deleteSubscriber');
        Route::get('export-subscribers', 'NewsletterController@exportSubscribers');
    });
});

