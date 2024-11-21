<?php
use App\Models\Product;
use App\Models\Category;
use App\Models\ShippingCharge;
?>
@extends('front.layout.layout')
@section('content')
<!-- offcanvas area start -->
<div class="offcanvas__area">
    <div class="offcanvas__wrapper">
    <div class="offcanvas__close">
        <button class="offcanvas__close-btn" id="offcanvas__close-btn">
            <i class="fal fa-times"></i>
        </button>
    </div>
    <div class="offcanvas__content">
        <div class="offcanvas__logo mb-40">
            <a href="index.html">
            <img src="{{ asset('front/img/logo/logo-white.png') }}" alt="logo">
            </a>
        </div>
        <div class="offcanvas__search mb-25">
            <form action="#">
                <input type="text" placeholder="What are you searching for?">
                <button type="submit" ><i class="far fa-search"></i></button>
            </form>
        </div>
        <div class="mobile-menu fix"></div>
        <div class="offcanvas__action">

        </div>
    </div>
    </div>
</div>
<!-- offcanvas area end -->      
<div class="body-overlay"></div>
<!-- offcanvas area end -->

<main>
    <!-- page-banner-area-start -->
    <div class="page-banner-area page-banner-height-2" data-background="assets/img/banner/page-banner-4.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Checkout</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                        <a href="index.html"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                        <span>Checkout</span>
                                        </li>
                                    </ul>
                                </nav> 
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-banner-area-end -->

    <!-- coupon-area-start -->
    <section class="coupon-area pt-120 pb-30">
        <div class="container">
        <div class="row">
        <div class="col-md-6">
            <div class="coupon-accordion">
                    <!-- ACCORDION START -->
                    <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                    <div class="coupon-info">
                        <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                sit amet ipsum luctus.</p>
                        <form action="#">
                                <p class="form-row-first">
                                <label>Username or email <span class="required">*</span></label>
                                <input type="text">
                                </p>
                                <p class="form-row-last">
                                <label>Password <span class="required">*</span></label>
                                <input type="text">
                                </p>
                                <p class="form-row">
                                <button class="tp-btn-h1" type="submit">Login</button>
                                <label>
                                    <input type="checkbox">
                                    Remember me
                                </label>
                                </p>
                                <p class="lost-password">
                                <a href="#">Lost your password?</a>
                                </p>
                        </form>
                    </div>
                    </div>
                    <!-- ACCORDION END -->
            </div> 
            <br>
                <div id="deliveryAddresses">
                    @include('front.products.delivery_addresses')
                </div>
        </div>
        <div class="col-md-6">
            <div class="coupon-accordion">
                    <!-- ACCORDION START -->
                    <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                    <div class="coupon-info">
                        <form action="#">
                                <p class="checkout-coupon">
                                <input type="text" placeholder="Coupon Code">
                                <button class="tp-btn-h1" type="submit">Apply Coupon</button>
                                </p>
                        </form>
                    </div>
                    </div>
                    <!-- ACCORDION END -->
            </div>
        </div>
        
        </div>


        <!--My-->
            
        <!--end My-->

    </div>
    
    </section>
    
    <!-- coupon-area-end -->

    <!-- checkout-area-start -->                          
    <section class="checkout-area pb-85">
        <div class="container">
            <form action="#" id="deliveryAddressForm" action="javascript:;" method="post">@csrf
                <input type="hidden" name="delivery_id">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            <h3 class="deliveryText">Add New Delivery Address</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="country-select">
                                        <label>Country <span class="required">*</span></label>
                                        <select style="display: none;" id="delivery_country" name="delivery_country">
                                            <option selected value="">Choose Country</option>
                                            @foreach ($countries as $country)
                                              <option value="{{ $country['country_name'] }}" @if ($country['country_name']==Auth::user()->country)selected
                                              
                                              @endif>{{ $country['country_name'] }}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                    <p id="delivery-delivery_country"></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Name <span class="required">*</span></label>
                                        <input type="text" id="delivery_name" name="delivery_name" placeholder="">
                                    </div>
                                    <p id="delivery-delivery_name"></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" id="delivery_address" name="delivery_address" placeholder="Street address">
                                    </div>
                                    <p id="delivery-delivery_address"></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input type="text" placeholder="Apartment, suite, unit etc. (optional)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>City <span class="required">*</span></label>
                                        <input type="text" id="delivery_city" name="delivery_city" placeholder="City">
                                    </div>
                                    <p id="delivery-delivery_city"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>State<span class="required">*</span></label>
                                        <input type="text" id="delivery_state" name="delivery_state" placeholder="">
                                    </div>
                                    <p id="delivery-delivery_state"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode <span class="required">*</span></label>
                                        <input type="text" id="delivery_pincode" name="delivery_pincode" placeholder="Postcode">
                                    </div>
                                    <p id="delivery-delivery_pincode"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email<span class="required">*</span></label>
                                        <input type="email" id="delivery_email" name="delivery_email" placeholder="">
                                    </div>
                                    <p id="delivery-delivery_email"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" id="delivery_mobile" name="delivery_mobile" placeholder="Phone">
                                    </div>
                                    <p id="delivery-delivery_mobile"></p>
                                </div>
                            </div>
                            <div class="order-button-payment mt-20">
                                <button type="submit" id="deliveryForm" class="tp-btn-h1">Save</button>
                            </div>
                            
                        </div>
                    </div>
                    </form>
                    <div class="col-lg-6">
                        @if(Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error:</strong> {{ Session::get('error_message') }}
                            <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>-->
                        </div>
                        @endif
                        <div class="your-order mb-30 ">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Image</th>
                                            <th class="product-name">Name</th>
                                            <th class="product-name">Size</th>
                                            <th class="product-name"> QTY</th>
                                            <th class="product-name">Total</th>
                                            <th class="product-name">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total_price = 0 @endphp
                                        @php $total_weight = 0 @endphp
                                        @php $shipping_charges = 0 @endphp
                                        @php $product_weight = 0 @endphp
                                        @php $total_weight = $total_weight + $product_weight; @endphp
                                        @foreach($getCartItems as $item)
                                        @php 
                                            $getAttributePrice = Product::getAttributePrice($item['product_id'],$item['product_size']);
                                            // dd($getAttributePrice);
                                        @endphp
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                @if (isset($item['product']['images'][0]['image']) && !empty($item['product']['images'][0]['image']))
                                                    <img style="width: 50px; height:70px" src="{{ asset('front/images/products/small/'.$item['product']['images'][0]['image']) }}" alt="product">
                                                    @else
                                                    <img src="{{ asset('front/img/product/tp-1.jpg') }}" alt="product">
                                                    @endif
                                            </td>
                                            <td class="product-name">
                                                {{ $item['product']['product_name'] }} <strong class="product-quantity"></strong>
                                            </td>
                                            <td class="product-name">
                                                {{ $item['product_size'] }} <strong class="product-quantity"></strong>
                                            </td>
                                            <td class="product-name">
                                                <strong style="position:center;" class="product-quantity"> × {{$item['product_qty'] }}</strong>
                                            </td>
                                            <td class="product-name">
                                                <span class="amount">${{ $getAttributePrice['final_price']*$item['product_qty'] }}</span>
                                            </td>
                                            </td>
                                                <td class="product-remove deleteCartItem confirmDelete" data-cartid="{{$item['id'] }}" data-page="Checkout"><a href="#" ><i style="color:#fcbe00;" class="fa fa-trash " ></i></a>
                                            </td>
                                        </tr>
                                        @php
                                        $total_price = $total_price + ($getAttributePrice['final_price']*$item['product_qty']);
                                        @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span style="float: left;" class="amount"> {{$total_price}}</span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Coupon Discount</th>
                                            <td>
                                                <span style="float: left;" class="amount coupon_amount couponAmount">
                                                   @if (Session::has('couponAmount'))
                                                    {{Session::get('couponAmount')}}
                                                   @else
                                                    0 £
                                                   @endif
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span style="float: left;" class="amount"> {{$total_price}}</span></td>
                                        </tr>
                                            <tr class="shipping">
                                                <th>Shipping Charge</th>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <!--<input type="radio" name="shipping">-->
                                                            <label>
                                                                <span class="amount shipping_charges">{{$shipping_charges}}</span>
                                                            </label>
                                                        </li>
                                                        <!--<li>
                                                            <input type="radio" name="shipping">
                                                            <label>Free Shipping:</label>
                                                        </li>-->
                                                        
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-totalx">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount grang_total">{{ $total_price - Session::get('couponAmount')+ $shipping_charges }}</span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                </table>
                            </div>

                            <div class="payment-method">
                             <form action="{{ url('checkout') }}" name="checkoutForm" method="post">@csrf
                                <div class="accordion" id="checkoutAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="checkoutOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bankOne" aria-expanded="true" aria-controls="bankOne">
                                                PAYMENT METHOD
                                            </button>
                                        </h2>
                                        <div id="bankOne" class="accordion-collapse collapse show" aria-labelledby="checkoutOne" data-bs-parent="#checkoutAccordion">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="payment_gateway" id="bankTransfer" value="COD">
                                                        <label class="form-check-label" for="bankTransfer">
                                                            COD
                                                        </label>
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="payment_gateway" id="bankTransfer" value="Bank Transfer">
                                                        <label class="form-check-label" for="bankTransfer">
                                                            Bank Transfer
                                                        </label>
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                    
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="payment_gateway" id="creditCard" value="Credit Card">
                                                        <label class="form-check-label" for="creditCard">
                                                            Credit Card
                                                        </label>
                                                        <p>Pay using your credit card. You will be redirected to a secure payment gateway.</p>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="payment_gateway" id="paypal" value="Paypal">
                                                        <label class="form-check-label" for="paypal">
                                                            PayPal
                                                        </label>
                                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="login-password"></p>
                                    <div class="login-action mb-10 fix"><br>
                                        <span class="log-rem f-left">
                                            <input id="remember-me" type="checkbox" name="agree" value="Yes" >
                                            <label for="remember-me" style="color: #fcbe00;"> &nbsp;Agree To The Terms And Condition</label>
                                        </span>
                                    </div>
                                <div class="order-button-payment mt-20">
                                <button type="submit" class="tp-btn-h1">Place order</button>
                                </div>
                            

                        </form>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    
    <!-- checkout-area-end -->

</main>

@endsection