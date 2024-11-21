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
                                            <li class="breadcrumb-item active">Edit Shipping!</li>
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
                                    <!--<h4 class="header-title">Add Brand</h4>-->
                                </div>
                                <div class="card-body">
                                   @if(Session::has('success_message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Success:</strong> {{ Session::get('success_message') }}
                                            <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>-->
                                        </div>
                                    @endif
                                         
                                    <form name="shippingForm" id="shippingForm"  action="{{ url('admin/edit-shipping-charges/'.$shippingDetails['id']) }}" method="post">@csrf
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-12">
                                                <label for="shipping_name" class="form-label">Country*</label>
                                                <input type="text" class="form-control" value="{{ $shippingDetails['country'] }}" readonly="" style="background-color:#666666;">
                                            </div> 
                                            <div class="mb-3 col-md-12">
                                                <label for="0_500g" class="form-label">Rate (0-500g)*</label>
                                                <input type="text" class="form-control" id="0_500g" name="0_500g" placeholder="Enter Shipping Rate" @if(!empty($shippingDetails['0_500g'])) value="{{ $shippingDetails['0_500g'] }}" @else value="{{ old('0_500g') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="501_1000g" class="form-label">Rate (501-1000g)*</label>
                                                <input type="text" class="form-control" id="501_1000g" name="501_1000g" placeholder="Enter Shipping Rate" @if(!empty($shippingDetails['501_1000g'])) value="{{ $shippingDetails['501_1000g'] }}" @else value="{{ old('501_1000g') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="1001_1500g" class="form-label">Rate (1001-1500g)*</label>
                                                <input type="text" class="form-control" id="1001_1500g" name="1001_1500g" placeholder="Enter Shipping Rate" @if(!empty($shippingDetails['1001_1500g'])) value="{{ $shippingDetails['1001_1500g'] }}" @else value="{{ old('1001_1500g') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="1501_2000g" class="form-label">Rate (1501-2000g)*</label>
                                                <input type="text" class="form-control" id="1501_2000g" name="1501_2000g" placeholder="Enter Shipping Rate" @if(!empty($shippingDetails['1501_2000g'])) value="{{ $shippingDetails['1501_2000g'] }}" @else value="{{ old('1501_2000g') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="2001_2500g" class="form-label">Rate (2001-2500g)*</label>
                                                <input type="text" class="form-control" id="2001_2500g" name="2001_2500g" placeholder="Enter Shipping Rate" @if(!empty($shippingDetails['2001_2500g'])) value="{{ $shippingDetails['2001_2500g'] }}" @else value="{{ old('2001_2500g') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="2501_3000g" class="form-label">Rate (2501-3000g)*</label>
                                                <input type="text" class="form-control" id="2501_3000g" name="2501_3000g" placeholder="Enter Shipping Rate" @if(!empty($shippingDetails['2501_3000g'])) value="{{ $shippingDetails['2501_3000g'] }}" @else value="{{ old('2501_3000g') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="3001_3500g" class="form-label">Rate (3001-3500g)*</label>
                                                <input type="text" class="form-control" id="3001_3500g" name="3001_3500g" placeholder="Enter Shipping Rate" @if(!empty($shippingDetails['3001_3500g'])) value="{{ $shippingDetails['3001_3500g'] }}" @else value="{{ old('3001_3500g') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="3501_4000g" class="form-label">Rate (3501-4000g)*</label>
                                                <input type="text" class="form-control" id="3501_4000g" name="3501_4000g" placeholder="Enter Shipping Rate" @if(!empty($shippingDetails['3501_4000g'])) value="{{ $shippingDetails['3501_4000g'] }}" @else value="{{ old('3501_4000g') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="4001_4500g" class="form-label">Rate (4001-4500g)*</label>
                                                <input type="text" class="form-control" id="4001_4500g" name="4001_4500g" placeholder="Enter Shipping Rate" @if(!empty($shippingDetails['4001_4500g'])) value="{{ $shippingDetails['4001_4500g'] }}" @else value="{{ old('4001_4500g') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="4501_5000g" class="form-label">Rate (4501-5000g)*</label>
                                                <input type="text" class="form-control" id="4501_5000g" name="4501_5000g" placeholder="Enter Shipping Rate" @if(!empty($shippingDetails['4501_5000g'])) value="{{ $shippingDetails['4501_5000g'] }}" @else value="{{ old('4501_5000g') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="Above_5000g" class="form-label">Rate (Above-5000g)*</label>
                                                <input type="text" class="form-control" id="Above_5000g" name="Above_5000g" placeholder="Enter Shipping Rate" @if(!empty($shippingDetails['Above_5000g'])) value="{{ $shippingDetails['Above_5000g'] }}" @else value="{{ old('Above_5000g') }}" @endif>
                                            </div>
                                
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
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