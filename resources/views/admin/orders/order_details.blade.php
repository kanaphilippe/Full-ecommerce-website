 @php
 use App\Models\Product;
 @endphp
 @extends('admin.layout.layout')
@section('content')
<!-- Middle contain start here -->
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Velonic</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Orders Details!</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Welcome <strong>{{ Auth::guard('admin')->user()->name}} ({{Auth::guard('admin')->user()->type}})!</h4>
                    </div>
                </div>
            </div>
            @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ Session::get('success_message') }}
                    <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>-->
                </div>
            @endif
            <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Order Summary</h4>
                                    <p class="text-muted mb-0">
                                        
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive-sm">
                                        <table class="table table-hover table-centered mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Order ID</td>
                                                    <td>{{ $orderDetails['id'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Order Status</td>
                                                    <td>{{ $orderDetails['order_status'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Order Total</td>
                                                    <td>{{ $orderDetails['grand_total'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping Charges</td>
                                                    <td>{{ $orderDetails['shipping_charges'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Coupon Code</td>
                                                    <td>{{ $orderDetails['coupon_code'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Coupon Amount</td>
                                                    <td>{{ $orderDetails['coupon_amount'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Payment Method</td>
                                                    <td>{{ $orderDetails['payment_method'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Customer Details</h4>
                                    <p class="text-muted mb-0">
                                        
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive-sm">
                                        <table class="table table-hover table-centered mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>{{ $orderDetails['user']['name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address </td>
                                                    <td>{{ $orderDetails['user']['email'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>City</td>
                                                    <td>{{ $orderDetails['grand_total'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row-->

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Billing Address</h4>
                                    <p class="text-muted mb-0">
                                        
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive-sm">
                                        <table class="table table-hover table-centered mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>{{ $orderDetails['user']['name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>{{ $orderDetails['user']['address'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>City</td>
                                                    <td>{{ $orderDetails['user']['city'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>State</td>
                                                    <td>{{ $orderDetails['user']['state'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Country</td>
                                                    <td>{{ $orderDetails['user']['country'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pincode</td>
                                                    <td>{{ $orderDetails['user']['pincode'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Payment Method</td>
                                                    <td>{{ $orderDetails['user']['name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile</td>
                                                    <td>{{ $orderDetails['user']['mobile'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Update Order Status</h4>
                                    <p class="text-muted mb-0">
                                        
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive-sm">
                                        <table class="table table-hover table-centered mb-0">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        <form action="{{ url('admin/update-order-status') }}" method="post">@csrf
                                                            <input type="hidden" name="order_id" value="{{ $orderDetails['id']}}">
                                                            <select name="order_status" id="order_status">
                                                                <option value="">Select</option>
                                                                @foreach ($orderStatuses as $status)
                                                                    <option value="{{ $status['name'] }}">{{ $status['name'] }}</option>
                                                                @endforeach
                                                            </select>&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input style="width: 150px;" type="text" name="courier_name" id="courier_name" placeholder="Courier Name">&nbsp;&nbsp;
                                                            <input style="width: 150px;"  type="text" name="tracking_number" id="tracking_number" placeholder="Tracking Number">
                                                            <button style="float: right;" type="submit">Update</button>
                                                        </form><br>
                                                        @foreach ($orderDetails['log'] as $log)
                                                           <span style="height: 10px;"></span><strong>{{ $log['order_status'] }}</strong><br>
                                                             @if ($log['order_status']=="Shipped")
                                                               @if(!empty($orderDetails['courier_name']))
                                                               <span style="height: 10px;"></span><strong>Courier Name:  &nbsp;{{ $orderDetails['courier_name']}}</strong><br>
                                                               @endif
                                                               @if(!empty($orderDetails['tracking_number']))
                                                               <span style="height: 10px;"></span><strong>Tracking Number:  &nbsp;{{ $orderDetails['tracking_number']}}</strong><br>
                                                               @endif
                                                             @endif
                                                           {{ date("F j, Y, g:i a", strtotime($log['created_at'] )) }}
                                                           <hr Color="white">
                                                        @endforeach
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Delivery Address</h4>
                                    <p class="text-muted mb-0">
                                        
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive-sm">
                                        <table class="table table-hover table-centered mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>{{ $orderDetails['name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>{{ $orderDetails['address'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>City</td>
                                                    <td>{{ $orderDetails['city'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>State</td>
                                                    <td>{{ $orderDetails['state'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Country</td>
                                                    <td>{{ $orderDetails['country'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pincode</td>
                                                    <td>{{ $orderDetails['pincode'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Payment Method</td>
                                                    <td>{{ $orderDetails['payment_gateway'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile</td>
                                                    <td>{{ $orderDetails['mobile'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->

                                </div>
                                
                                 <!-- end card body-->
                            </div>
                             <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row-->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Ordered Products</h4>
                                    <p class="text-muted mb-0">
                                        
                                    </p>
                                </div>
                                <div class="card-body">

                                    <table id="orderDetails" class="table table-striped w-100 nowrap">
                                        <thead>
                                            <tr>
                                                <th>Product Image</th>
                                                <th>product Code</th>
                                                <th>Product Name</th>
                                                <th>Product Size</th>
                                                <th>Product Color</th>
                                                <th>Product Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderDetails['orders_products'] as $product)
                                            @php
                                            $getProductImage = Product::getProductImage($product['product_id'])
                                            @endphp
                                            <tr>
                                                <td>
                                                @php $getProductImage = Product::getProductImage($product['product_id']) @endphp
                                                        @if($getProductImage!="")
                                                            <a href="{{ url('product/'.$product['product_id']) }}" target="_blank"><img style="width: 80px; height:80px;" src="{{ asset('front/images/products/small/'.$getProductImage)}}" class="img-sm border"></a>
                                                        @else
                                                            <img src="https://i.imgur.com/iDwDQ4o.png" class="img-sm border">
                                                        @endif
                                                </td>
                                                <td>{{ $product['product_code']}}</td>
                                                <td>{{ $product['product_name']}}</td>
                                                <td>{{ $product['product_size']}}</td>
                                                <td>{{ $product['product_color']}}</td>
                                                <td>{{ $product['product_qty']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->

        </div>
        <!-- container -->

    </div>
    <!-- content -->

    <!-- Footer Start -->
    @include('admin.layout.footer')
    <!-- end Footer -->

</div>
<!-- Middle contain end here -->
@endsection