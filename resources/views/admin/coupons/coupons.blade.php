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
                            <li class="breadcrumb-item active">Coupons</li>
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
                @if ($couponsModule['edit_access']==1 || $couponsModule['full_access']==1)
                <div class="card-header">
                    <h1 class="header-title">Coupons</h1>
                    <a style="max-width: 150px; float: right; display: inline-block;" href="{{ url('admin/add-edit-coupon') }}" class="btn btn-block btn-primary">Add Coupons</a><br><br>
                    @endif
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
                    <table id="coupons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Coupon Type</th>
                                <th>Amount</th>
                                <th>Expiry Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as  $coupon)
                            <tr>
                                <td>{{ $coupon['id'] }}</td>
                                <td>{{ $coupon['coupon_code'] }}</td>
                                <td>{{ $coupon['coupon_type'] }}</td>
                                <td>{{ $coupon['amount'] }}
                                    @if ($coupon['amount_type']=="Percentage") % @else £
                                    @endif
                                </td>
                                <td>{{ date("F j, Y, g:i a", strtotime($coupon['expiry_date'] )) }}</td>
                                <td>
                                    @if ($couponsModule['edit_access']==1 || $couponsModule['full_access']==1)
                                    @if($coupon['status']==1)
                                        <a class="updateCouponStatus" id="coupon-{{ $coupon['id'] }}" coupon_id="{{ $coupon['id'] }}" style="color: #5BD1D7; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch" status="Active"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @else
                                        <a class="updateCouponStatus" id="coupon-{{ $coupon['id'] }}" coupon_id="{{ $coupon['id'] }}" style="color: red; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch-off" status="Inactive"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @endif
                                    @endif
                                    @if ($couponsModule['edit_access']==1 || $couponsModule['full_access']==1)
                                    <a style="font-size:30px;" href="{{ url('admin/add-edit-coupon/'.$coupon['id'])}}"><i class="ri-edit-fill"></i></a>
                                    @endif
                                    @if ($couponsModule['full_access']==1)
                                        <a style="font-size:30px;" class="confirmDelete" title="Delete Coupon" href="javascript:void(0)" record="coupon" recordid="{{ $coupon['id'] }}" ><i class="ri-delete-bin-5-line"></i></a>&nbsp;&nbsp;&nbsp;
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