@php
use App\Models\Product;
@endphp
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

    
    <!-- coupon-area-end -->

    <!-- checkout-area-start -->                          
    <section class="checkout-area pb-85">
        <div class="container"><br><br><br>
            <div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <h6>Order ID: #{{$orderDetails['id']}}</h6>
            <h6>Total Amount: {{$orderDetails['grand_total']}}</h6>
            <h6>Shipping Fee: £{{$orderDetails['shipping_charges']}}</h6>
            <h6>Discount: £ @if($orderDetails['coupon_amount']>0){{$orderDetails['coupon_amount']}}@else 0 @endif</h6>
            @php $total_price = 0 @endphp
            @foreach($orderDetails['orders_products'] as $key => $product)
            @php
            $total_price = $total_price + ($product['product_price']*$product['product_qty']);
            @endphp
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Placed Date and Time:</strong> <br>{{date("F j, Y, g:i a",strtotime($orderDetails['created_at']));}}</div>
                    <div class="col"> <strong>Subtotal:</strong> <br> £{{$total_price }} </div>
                    <div class="col"> <strong>Shipping Address:</strong> <br>{{$orderDetails['name']}}<br>{{$orderDetails['address']}}  <br>{{$orderDetails['city']}}
                    {{$orderDetails['country']}} <br> {{$orderDetails['state']}} <br>{{$orderDetails['pincode']}} <br><i class="fa fa-phone"></i> {{$orderDetails['mobile']}} </div>
                    <div class="col"> <strong>Package:</strong> <br> {{ $key+1}} </div>
                    
                </div>
            </article> 
            <div class="track">
    <div class="step step-complete"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
    <div @if($orderDetails['order_status']=="Shipped" || $orderDetails['order_status']=="Delivered") class="step step-complete " @else class="step instep-complete" @endif> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Picked by courier</span> </div>
    <div @if($orderDetails['order_status']=="Delivered") class="step step-complete" @else class="step instep-complete" @endif> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for Delivered</span> </div>
</div>
            <hr>
            <ul class="row">
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside">
                            @php $getProductImage = Product::getProductImage($product['product_id']) @endphp
                            @if($getProductImage!="")
                                <img style="width: 150px; height:150px;" src="{{ asset('front/images/products/small/'.$getProductImage)}}" class="img-sm border">
                            @else
                                <img src="https://i.imgur.com/iDwDQ4o.png" class="img-sm border">
                            @endif
                        </div>
                        <figcaption class="info align-self-center">
                            <p class="title">Name:{{ $product['product_name']}} <br>Size: {{$product['product_size']}}</p>Quantity: {{ $product['product_qty']}}
                            <p class="title">Code{{ $product['product_code']}}</p>
                            <span class="text-muted">Price: ${{ $product['product_price']}} </span>
                        </figcaption>
                    </figure>
                </li>
            </ul>
            @endforeach
            <hr>
            <div class="col"> <strong>Order Logs/ Tracking Details:</strong> <br> <br>
            @foreach ($orderDetails['log'] as $log)
                <span style="height: 10px;">
                </span>
                <strong>{{ $log['order_status'] }}
                </strong>
                <br>
                    @if ($log['order_status']=="Shipped")
                      @if(!empty($orderDetails['courier_name']))
                    <span style="height: 10px;">
                    </span>
                    <strong>Courier Name:  &nbsp;{{ $orderDetails['courier_name']}}
                    </strong>
                    <br>
                    @endif
                    @if(!empty($orderDetails['tracking_number']))
                    <span style="height: 10px;">

                    </span>
                    <strong>Tracking Number:  &nbsp;{{ $orderDetails['tracking_number']}}

                    </strong><br>
                    @endif
                    @endif
                {{ date("F j, Y, g:i a", strtotime($log['created_at'] )) }}
                <hr Color="white">
            @endforeach 
            </div>
        </div>
    </article>
               </div>
        </div>
    </section>

<style>
   @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

body {
    background-color: #eeeeee;
    font-family: 'Open Sans', serif;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem;
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0;
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px;
}

.track .step {
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative;
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px;
}

.track .step .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd;
}

.track .step .text {
    display: block;
    margin-top: 7px;
}

.track .step-complete::before {
    background: #FF5722;
}

.track .step-complete .icon {
    background: #ee5435;
    color: #fff;
}

.track .step-complete .text {
    font-weight: 400;
    color: #000;
}

.track .step-incomplete::before {
    background: #ddd;
}

.track .step-incomplete .icon {
    background: #ddd;
    color: #999;
}

.track .step-incomplete .text {
    font-weight: 300;
    color: #999;
}

.itemside {
    position: relative;
    display: flex;
    width: 100%;
}

.itemside .aside {
    position: relative;
    flex-shrink: 0;
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px;
}

ul.row, ul.row-sm {
    list-style: none;
    padding: 0;
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px;
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529;
}

p {
    margin-top: 0;
    margin-bottom: 1rem;
}

.btn-warning {
    color: #ffffff;
    background-color: #ee5435;
    border-color: #ee5435;
    border-radius: 1px;
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #ff2b00;
    border-color: #ff2b00;
    border-radius: 1px;
}


</style>
    
    <!-- checkout-area-end -->

</main>

@endsection