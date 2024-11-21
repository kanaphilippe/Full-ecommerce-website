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
                                            <li class="breadcrumb-item active">Add Brand!</li>
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
                                    <h4 class="header-title">Add Brand</h4>
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
                                         
                                    <form name="brandForm" id="brandForm" @if (empty($brand['id'])) action="{{ url('admin/add-edit-brand') }}" @else
                                    action="{{ url('admin/add-edit-brand/'.$brand['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-12">
                                                <label for="brand_name" class="form-label">Brand Name*</label>
                                                <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand Name" @if(!empty($brand['brand_name'])) value="{{ $brand['brand_name'] }}" @else value="{{ old('brand_name') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="brand_image" class="form-label">Brand Image*</label>
                                                <input type="file" class="form-control" id="brand_image" name="brand_image" >
                                                @if(!empty($brand['brand_image']))
                                                   <a target="_blank" href="{{url('front/images/brands/'.$brand['brand_image']) }}"><img style="width: 150px; margin-top: 25px;" src="{{ asset('front/images/brands/'.$brand['brand_image']) }}"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                   <a style="font-size:30px; margin-bottom: 115px;" class="confirmDelete" title="Delete Brand Image" href="javascript:void(0)" record="brand-image" recordid="{{ $brand['id'] }}" ><i class="ri-delete-bin-5-line"></i></a>
                                                   @endif
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="brand_logo" class="form-label">Brand Logo*</label>
                                                <input type="file" class="form-control" id="brand_logo" name="brand_logo" >
                                                @if(!empty($brand['brand_logo']))
                                                   <a target="_blank" href="{{url('front/images/brands/'.$brand['brand_logo']) }}"><img style="width: 150px; margin-top: 25px;" src="{{ asset('front/images/brands/'.$brand['brand_logo']) }}"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                   <a style="font-size:30px; margin-bottom: 115px;" class="confirmDelete" title="Delete Brand Image" href="javascript:void(0)" record="brand-logo" recordid="{{ $brand['id'] }}" ><i class="ri-delete-bin-5-line"></i></a>
                                                   @endif
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="brand_discount" class="form-label">Brand Discount*</label>
                                                <input type="text" class="form-control" id="brand_discount" name="brand_discount" placeholder="Enter brand Discount" @if(!empty($brand['brand_discount'])) value="{{ $brand['brand_discount'] }}" @else value="{{ old('brand_discount') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="url" class="form-label">Brand URL*</label>
                                                <input type="text" class="form-control" id="url" name="url" placeholder="Enter brand URL" @if(!empty($brand['url'])) value="{{ $brand['url'] }}" @else value="{{ old('url') }}" @endif>
                                            </div>
                                        </div>
                                         <h5 class="mb-3 mt-4">Brand Description*</h5>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Enter brand Discription"
                                                    id="description" name="description" style="height: 100px" >@if(!empty($brand['description'])) {{ $brand['description'] }} @else {{ old('description') }} @endif</textarea>
                                                <label for="description">Enter Description</label>
                                            </div>
                                            <br>
                                        <div class="mb-3">
                                            <label for="meta_title" class="form-label">Meta Title*</label>
                                            <input type="text" class="form-control" name="meta_title" id="meta_title"
                                                placeholder="Enter Meta Title" @if(!empty($brand['meta_title'])) value="{{ $brand['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif>
                                        </div>
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-12">
                                                <label for="meta_description" class="form-label">Meta Description*</label>
                                                <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description" @if(!empty($brand['meta_description'])) value="{{ $brand['meta_description'] }}" @else value="{{ old('meta_description') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="meta_keywords" class="form-label">Meta Keywords*</label>
                                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" @if(!empty($brand['meta_keywords'])) value="{{ $brand['meta_keywords'] }}" @else value="{{ old('meta_keywords') }}" @endif>
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