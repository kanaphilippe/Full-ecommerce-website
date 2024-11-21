
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
    <div class="page-banner-area page-banner-height-2" data-background="{{ asset('front/img/banner/page-banner-4.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-banner-content text-center">
                        <h4 class="breadcrumb-title">Your Cart</h4>
                        <div class="breadcrumb-two">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                        <a href="index.html"><span>Home</span></a>
                                        </li>
                                        <li class="trail-item">
                                        <span>Cart</span>
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

    <!-- cart-area-start -->
     
    <section class="cart-area pt-120 pb-120">
        <div class="print-success-msg" style="color: green; width:90%; margin-left:70px;"></div>
        <div class="print-error-msg"></div>
        <div class="container" id="appendCartItems">
            @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>-->
                </div>
            @endif
            @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ Session::get('success_message') }}
                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>-->
                </div>
            @endif
            @include('front.products.cart_items')
        </div>
        </section>
        <!-- cart-area-end -->
</main>
@endsection