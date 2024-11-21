@extends('admin.layout.layout')
@section('content')

<!-- Form row -->
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
                        <li class="breadcrumb-item active">Edit Coupon!</li>
                    </ol>
                </div>
                <h4 class="page-title">Welcome <strong>{{ Auth::guard('admin')->user()->name}} ({{Auth::guard('admin')->user()->type}})!</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

<!-- Form row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Edit Coupon</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
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
                        
                <form name="couponForm" id="couponForm" @if (empty($coupon['id'])) action="{{ url('admin/add-edit-coupon') }}" @else
                action="{{ url('admin/add-edit-coupon/'.$coupon['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="row g-2">
                        @if(empty($coupon['coupon_code']))
                        <div class="mb-3 col-md-12">
                            <label for="coupon_option" class="form-label">Coupon Option</label>&nbsp;&nbsp;
                            <input type="radio" id="AutomaticCoupon" name="coupon_option" value="Automatic" checked="">&nbsp;Automatic&nbsp;&nbsp;
                            <input type="radio" id="ManualCoupon" name="coupon_option" value="Manual">&nbsp;Manual&nbsp;&nbsp;
                        </div> 
                        <div class="mb-3 col-md-12" style="display:none;" id="couponField">
                            <label for="coupon_code" class="form-label">Coupon Code*</label>
                            <input type="text" class="form-control" id="coupon_code" name="coupon_code" placeholder="Enter Coupon Code">
                        </div>
                        @else
                        <input type="hidden" name="coupon_option" value="{{ $coupon['coupon_option'] }}">
                        <input type="hidden" name="coupon_code" value="{{ $coupon['coupon_code'] }}">
                        <div class="form-group">
                            <label for="">Coupon Code</label>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;{{ $coupon['coupon_code'] }}</span>
                        </div>
                        @endif
                        <div class="mb-3 col-md-12">
                            <label for="coupon_type" class="form-label">Coupon Type</label>&nbsp;&nbsp;
                            <input type="radio" name="coupon_type" value="Single Time"  @if(isset($coupon['coupon_type']) && $coupon['coupon_type']=="Single Time") checked="" @elseif(!isset($coupon['coupon_type'])) checked="" @endif>&nbsp;Single Time&nbsp;&nbsp;
                            <input type="radio" name="coupon_type" value="Multiple Times" @if(isset($coupon['coupon_type']) && $coupon['coupon_type']=="Multiple Times") checked="" @endif>&nbsp;Multiple Times&nbsp;&nbsp;
                        </div> 
                        <div class="mb-3 col-md-12">
                            <label for="amount_type" class="form-label">Amount Type</label>&nbsp;&nbsp;
                            <input type="radio" name="amount_type" value="Percentage" @if(isset($coupon['amount_type']) && $coupon['amount_type']=="Percentage") checked="" @elseif(!isset($coupon['amount_type'])) checked="" @endif>&nbsp;Percentage&nbsp;&nbsp;
                            <input type="radio" name="amount_type" value="Fixed" @if(isset($coupon['amount_type']) && $coupon['amount_type']=="Fixed") checked="" @endif>&nbsp;Fixed&nbsp;&nbsp;
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="amount" class="form-label">Amount*</label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount" value="{{$coupon['amount'] }}">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="categories" class="form-label">Select Category*</label>
                            <select name="categories[]" multiple="" class="form-control">
                                <option value="">Select</option>
                                @foreach($getCategories as $cat)
                                    <option style="color: green;" value="{{ $cat['id'] }}" @if(in_array($cat['id'],$selCats)) selected="" @endif>{{ $cat['category_name'] }}</option>
                                    @if(!empty($cat['subcategories']))
                                        @foreach($cat['subcategories'] as $subcat)
                                        <option style="color: #E212A1;" value="{{ $subcat['id'] }}" @if(in_array($subcat['id'],$selCats)) selected="" @endif>>>{{ $subcat['category_name'] }}</option>
                                        @if(!empty($subcat['subcategories']))
                                            @foreach($subcat['subcategories'] as $subsubcat)
                                            <option style="color: violet;" value="{{ $subsubcat['id'] }}" @if(in_array($subsubcat['id'],$selCats)) selected="" @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>{{ $subsubcat['category_name'] }}</option>
                                            @endforeach
                                        @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="brands" class="form-label">Select Brand*</label>
                                <select name="brands[]" multiple="" class="form-control">
                                @foreach($getBrands as $brand)
                                    <option value="{{ $brand['id'] }}" @if(in_array($brand['id'],$selBrands)) selected="" @endif>{{ $brand['brand_name'] }}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="users" class="form-label">Select Users*</label>
                                <select name="users[]" multiple="" class="form-control">
                                @foreach($getUsers as $user)
                                    <option value="{{ $user['email'] }}" @if(in_array($user['email'],$selUsers)) selected="" @endif>{{ $user['email'] }}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="expiry_date" class="form-label">Expiry Date*</label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="Enter Expiry Date" value="{{ $coupon['expiry_date']}}">
                        </div>
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
</div>
<!-- container -->

</div>
<!-- content -->

<!-- Footer Start -->
@include('admin.layout.footer')
<!-- end Footer -->

</div>
<!-- end row -->

@endsection