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
                                            <li class="breadcrumb-item active">Shipping Charges!</li>
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
                                    <table id="shipping" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Country</th>
                                                <th>Rate (0 to 500g)</th>
                                                <th>Rate (501 to 1000g)</th>
                                                <th>Rate (1001 to 1500g)</th>
                                                <th>Rate (1501 to 2000g)</th>
                                                <th>Rate (2001 to 2500g)</th>
                                                <th>Rate (2501 to 3000g)</th>
                                                <th>Rate (3001 to 3500g)</th>
                                                <th>Rate (3501 to 4000g)</th>
                                                <th>Rate (4001 to 4500g)</th>
                                                <th>Rate (4501 to 5000g)</th>
                                                <th>Rate (Above to 5000g)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($shipping_charges as  $shipping)
                                            <tr>
                                                <td>{{ $shipping['id'] }}</td>
                                                <td>{{ $shipping['country'] }}</td>
                                                <td>{{ $shipping['0_500g'] }}</td>
                                                <td>{{ $shipping['501_1000g'] }}</td>
                                                <td>{{ $shipping['1001_1500g'] }}</td>
                                                <td>{{ $shipping['1501_2000g'] }}</td>
                                                <td>{{ $shipping['2001_2500g'] }}</td>
                                                <td>{{ $shipping['2501_3000g'] }}</td>
                                                <td>{{ $shipping['3001_3500g'] }}</td>
                                                <td>{{ $shipping['3501_4000g'] }}</td>
                                                <td>{{ $shipping['4001_4500g'] }}</td>
                                                <td>{{ $shipping['4501_5000g'] }}</td>
                                                <td>{{ $shipping['Above_5000g'] }}</td>
                                                <td>
                                                    @if ($shippingModule['edit_access']==1 || $brandsModule['full_access']==1)
                                                    @if($shipping['status']==1)
                                                        <a class="updateShippingStatus" id="shipping-{{ $shipping['id'] }}" shipping_id="{{ $shipping['id'] }}" style="color: #5BD1D7; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch" status="Active"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @else
                                                        <a class="updateShippingStatus" id="shipping-{{ $shipping['id'] }}" shipping_id="{{ $shipping['id'] }}" style="color: red; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch-off" status="Inactive"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @endif
                                                    @endif
                                                    @if ($shippingModule['edit_access']==1 || $shippingModule['full_access']==1)
                                                    <a style="font-size:30px;" href="{{ url('admin/edit-shipping-charges/'.$shipping['id'])}}"><i class="ri-edit-fill"></i></a>
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