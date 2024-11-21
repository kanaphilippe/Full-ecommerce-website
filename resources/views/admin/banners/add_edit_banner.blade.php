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
                                            <li class="breadcrumb-item active">Add Banner!</li>
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
                                    <h4 class="header-title">Add Banner</h4>
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
                                         
                                    <form name="bannerForm" id="bannerForm" @if (empty($banner['id'])) action="{{ url('admin/add-edit-banner') }}" @else
                                    action="{{ url('admin/add-edit-banner/'.$banner['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-12">
                                                <label for="type" class="form-label">Banner Type*</label>
                                                <select class="form-control" id="type" name="type">
                                                    <option value="">Select Banner Type</option>
                                                    <option @if(!empty($banner['type']) && $banner['type']=="Slider") selected @endif value="Slider">Slider</option>
                                                    <option @if(!empty($banner['type']) && $banner['type']=="Fix") selected @endif value="Fix">Fix</option>
                                                </select>    
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="image" class="form-label">Banner Image*</label>
                                                <input type="file" class="form-control" id="image" name="image" >
                                                @if(!empty($banner['image']))
                                                   <a target="_blank" href="{{url('front/images/banners/'.$banner['image']) }}"><img style="width: 150px; margin-top: 25px;" src="{{ asset('front/images/banners/'.$banner['image']) }}"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  
                                                   @endif
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="title" class="form-label">Banner Title*</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Banner Title" @if(!empty($banner['title'])) value="{{ $banner['title'] }}" @else value="{{ old('title') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="alt" class="form-label">Banner Alt*</label>
                                                <input type="text" class="form-control" id="alt" name="alt" placeholder="Enter Banner Alt" @if(!empty($banner['alt'])) value="{{ $banner['alt'] }}" @else value="{{ old('alt') }}" @endif>
                                            </div>
                                        
                                            <div class="mb-3 col-md-12">
                                                <label for="link" class="form-label">Banner Link*</label>
                                                <input type="text" class="form-control" id="link" name="link" placeholder="Enter Banner Link" @if(!empty($banner['link'])) value="{{ $banner['link'] }}" @else value="{{ old('link') }}" @endif>
                                            </div>

                                            <div class="mb-3 col-md-12">
                                                <label for="sort" class="form-label">Banner Sort*</label>
                                                <input type="number" class="form-control" id="sort" name="sort" placeholder="Enter Banner Sort" @if(!empty($banner['sort'])) value="{{ $banner['sort'] }}" @else value="{{ old('sort') }}" @endif>
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