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
                                            <li class="breadcrumb-item active">Orders!</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome <strong>{{ Auth::guard('admin')->user()->name}} ({{Auth::guard('admin')->user()->type}})!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                         <div class="row">
                        <div class="col-12">  
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="header-title">Orders</h1>
                                    @if(Session::has('success_message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Success:</strong> {{ Session::get('success_message') }}
                                            <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>-->
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <table id="orders" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Order Date</th>
                                                <th>Customer Name</th>
                                                <th>Customer Email</th>
                                                <th>Ordered Products</th>
                                                <th>Order Amount</th>
                                                <th>Order status</th>
                                                <th>Payment Method</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as  $order)
                                            <tr>
                                                <td>{{ $order['id'] }}</td>
                                                <td>{{ date("F j, Y, g:i a", strtotime($order['created_at'] )) }}</td>
                                                <td>{{ $order['user']['name'] }}</td>
                                                <td>{{ $order['user']['email'] }}</td>
                                                <td>
                                                    @foreach ($order['orders_products'] as $product)
                                                       {{$product['product_code'] }}({{ $product['product_qty']}})<br>
                                                    @endforeach
                                                </td>
                                                <td>{{ $order['grand_total'] }}</td>
                                                <td>{{ $order['order_status'] }}</td>
                                                <td>{{ $order['payment_method'] }}</td>
                                                <td>
                                                    
                                                    <a title="View Order Details" style="font-size:30px;" href="{{ url('admin/orders/'.$order['id']) }}"><i class="ri-file-3-fill"></i></a>&nbsp;
                                                    @if ($order['order_status']=="Shipped" || $order['order_status']=="Delivered")
                                                       <a target="_blank" title="Print HTML Order Invoice" style="font-size:30px;" href="{{ url('admin/print-order-invoice/'.$order['id']) }}"><i class="ri-printer-fill"></i></a>
                                                       <a target="_blank" title="Print PDF Order Invoice" style="font-size:30px;" href="{{ url('admin/print-pdf-order-invoice/'.$order['id']) }}"><i class="bi bi-file-earmark-pdf-fill"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>  <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->
                        <!-- end row -->

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