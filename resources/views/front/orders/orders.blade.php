
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
        <header class="card-header"> My Orders</header>
        <div class="card-body">
            @foreach ($orders as $order)
            <h6>Order #: {{$order->id}}</h6>
            Status: <span class="badge badge-info">{{$order->order_status}}</span>
            <a href="{{ url('/user/orders/'.$order->id) }}"><span style="float: right;" class="badge badge-info">View Details</span></a>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Placed Date and Time:</strong> <br>{{date("F j, Y, g:i a",strtotime($order->created_at));}}</div>
                    <div class="col"> <strong>Payment Method:</strong> <br>{{ $order->payment_method}} </div>
                    <div class="col"> <strong>Total Items:</strong> <br> Quantity: {{ count($order->orders_products) }}</div>
                    <!--<div class="col"> <strong>Status:</strong> <br> </div>-->
                    <div class="col"> <strong>Grand Total:</strong> <br> {{ $order->grand_total }} </div>
                </div>
            </article>
            <!--<div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
            </div>--><br><br>
            <hr>
            <!--<ul class="row">
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="https://i.imgur.com/iDwDQ4o.png" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">Dell Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$950 </span>
                        </figcaption>
                    </figure>
                </li>
            </ul>-->
            <hr><br>
            @endforeach
            <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
               </div>
        </div>
    </section>

<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
    body{
        background-color: #eeeeee;
        font-family: 'Open Sans',serif
    }
    /*.container{
        margin-top:50px;margin-bottom: 50px
    }*/
    .card{position: relative;display:
     -webkit-box;display: -ms-flexbox;display: 
     flex;-webkit-box-orient: vertical;-webkit-box-direction:
      normal;-ms-flex-direction: column;flex-direction: column;min-width:
       0;
       word-wrap: break-word;
       background-color: #fff;
       background-clip: border-box;
       border: 1px solid rgba(0, 0, 0, 0.1);
       border-radius: 0.10rem}
       .card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}
       .card-header{padding: 0.75rem 1.25rem;
       margin-bottom: 0;
       background-color: #fff;
       border-bottom: 1px solid rgba(0, 0, 0, 0.1)}
       .track{position: relative;
       background-color: #ddd;
       height: 7px;
       display: -webkit-box;
       display: -ms-flexbox;
       display: flex;
       margin-bottom: 60px;
       margin-top: 50px}
       .track .step{-webkit-box-flex: 1;
       -ms-flex-positive: 1;
       flex-grow: 1;
       width: 25%;
       margin-top: -18px;
       text-align: center;
       position: relative}
       .track 
       .step
       .active:before{background: #FF5722}
       .track 
       .step::before{height: 7px;
       position: absolute;
       content: "";
       width: 100%;
       left: 0;
       top: 18px
    }
       .track
        .step
        .active 
        .icon{background: #ee5435;
        color: #fff}
        .track 
        .icon{display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }
        .track
         .step
         .active 
         .text{
            font-weight: 400;
            color: #000
            }
            .track
            .text{
                display: block;
                margin-top: 7px
                }
                .itemside{
                    position: relative;
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    width: 100%
                }
                    .itemside
                     .aside{
                        position: relative;
                        -ms-flex-negative: 0;
                        flex-shrink: 0
                        }
                        .img-sm
                        {width: 80px;
                        height: 80px;
                        padding: 7px
                        }
                        ul.row,
                         ul
                         .row-sm
                         {list-style: none;
                         padding: 0
                         }
                         .itemside 
                         .info{
                            padding-left: 15px;
                            padding-right: 7px
                            }
                            .itemside 
                            .title{display: block;
                            margin-bottom: 5px;
                            color: #212529
                            }
                            p
                            {
                                margin-top: 0;
                                margin-bottom: 1rem
                                }
                                .btn-warning{
                                    color: #ffffff;
                                    background-color: #ee5435;
                                    border-color: #ee5435;
                                    border-radius: 1px
                                    }
                                    .btn-warning:hover
                                    {
                                        color: #ffffff;
                                        background-color: #ff2b00;
                                        border-color: #ff2b00;
                                        border-radius: 1px
                                        }
                                        
.badge-info {
    color: #fff;
    background-color: #17a2b8;
    margin-bottom: 10px;
    margin-top: 10px;
}
</style>
    
    <!-- checkout-area-end -->

</main>

@endsection