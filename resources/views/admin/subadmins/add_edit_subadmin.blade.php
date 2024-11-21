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
                                            <li class="breadcrumb-item active">{{ $title}}!</li>
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
                                    <h4 class="header-title">{{ $title }}</h4>
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

                                    @if(Session::has('error_message'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error:</strong> {{ Session::get('error_message') }}
                                            <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>-->
                                        </div>
                                    @endif
                                         
                                    <form name="subadminForm" id="subadminForm" @if(empty($cmspage['id'])) action="{{ url('admin/add-edit-subadmin') }}"
                                    @else action="{{ url('admin/add-edit-subadmin/'.$subadmindata['id']) }}"
                                    @endif 
                                    method="post" enctype="multipart/form-data">@csrf
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-12">
                                                <label for="name" class="form-label">Name*</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Subadmin Name" @if(!empty($subadmindata['name'])) value="{{ $subadmindata['name'] }}" 
                                                  @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="mobile" class="form-label">Mobile*</label>
                                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" @if(!empty($subadmindata['mobile'])) value="{{ $subadmindata['mobile'] }}" @endif>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email*</label>
                                            <input @if($subadmindata['id'] !="") disabled=""  @else @endif type="email" class="form-control" name="email" id="email"
                                                placeholder="Enter Email" @if(!empty($subadmindata['email'])) value="{{ $subadmindata['email'] }}" @endif>
                                        </div>
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-12">
                                                <label for="password" class="form-label">Password*</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" @if(!empty($subadmindata['password'])) value="{{ $subadmindata['password'] }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="image" class="form-label">Image</label>
                                                <input type="file" class="form-control" name="image" id="image">
                                                @if(!empty($subadmindata['image']))
                                                  <a target="_blank" href="{{ url('admin/images/photos/'.$subadmindata['image']) }}">View Photo</a>
                                                  <input type="hidden" name="current_image" value="{{ $subadmindata['image'] }}">
                                                @endif
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