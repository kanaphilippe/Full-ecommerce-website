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
                                            <li class="breadcrumb-item active">Update Admin Details!</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><strong>{{ Auth::guard('admin')->user()->name}} ({{Auth::guard('admin')->user()->type}})!</h4>
                                </div>
                            </div>
                        </div>
                       
                         <!-- Form row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Update Admin Details</h4>
                                    <!--<p class="text-muted mb-0">
                                        By adding <code>.row</code> & <code>.g-2</code>, you can have control over the
                                        gutter width in as well the inline as block direction.
                                    </p>-->
                                     @if(Session::has('error_message'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error:</strong> {{ Session::get('error_message') }}
                                            <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>-->
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

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ url('admin/update-details') }}" enctype="multipart/form-data">@csrf
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-6">
                                                <label for="admin_email" class="form-label">Email</label>
                                                <input class="form-control" id="admin_email"
                                                 value="{{ Auth::guard('admin')->user()->email }}" readonly="" style="background-color: #ccc;">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="admin_name" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="admin_name" id="admin_name"
                                                    placeholder="Name" value="{{ Auth::guard('admin')->user()->name }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="admin_mobile" class="form-label">Mobile</label>
                                                <input type="text" class="form-control" name="admin_mobile" id="admin_mobile"
                                                    placeholder="Mobile" value="{{ Auth::guard('admin')->user()->mobile }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="admin_image" class="form-label">Image</label>
                                                <input type="file" class="form-control" name="admin_image" id="admin_image">
                                                @if(!empty(Auth::guard('admin')->user()->image))
                                                  <a target="_blank" href="{{ url('admin/images/photos/'.Auth::guard('admin')->user()->image) }}">View Photo</a>
                                                  <input type="hidden" name="current_image" value="{{ Auth::guard('admin')->user()->image}}">
                                                @endif
                                            </div>
                                        </div>

                                        <!--<div class="mb-3">
                                            <label for="inputAddress" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="inputAddress"
                                                placeholder="1234 Main St">
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputAddress2" class="form-label">Address 2</label>
                                            <input type="text" class="form-control" id="inputAddress2"
                                                placeholder="Apartment, studio, or floor">
                                        </div>

                                        <div class="row g-2">
                                            <div class="mb-3 col-md-6">
                                                <label for="inputCity" class="form-label">City</label>
                                                <input type="text" class="form-control" id="inputCity">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="inputState" class="form-label">State</label>
                                                <select id="inputState" class="form-select">
                                                    <option>Choose</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-2">
                                                <label for="inputZip" class="form-label">Zip</label>
                                                <input type="text" class="form-control" id="inputZip">
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck11">
                                                <label class="form-check-label" for="customCheck11">Check this custom
                                                    checkbox</label>
                                            </div>
                                        </div>-->

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
<!-- Middle contain end here -->
@endsection