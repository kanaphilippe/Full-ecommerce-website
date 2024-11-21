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
                                            <li class="breadcrumb-item active">Update Password!</li>
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
                                    <h4 class="header-title">Update Password</h4>
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
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ url('admin/update-password') }}">@csrf
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-6">
                                                <label for="admin_email" class="form-label">Email</label>
                                                <input class="form-control" id="admin_email"
                                                 value="{{ Auth::guard('admin')->user()->email }}" readonly="" style="background-color: #ccc;">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="current_pwd" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" name="current_pwd" id="current_pwd"
                                                    placeholder="Current Password"><span id="verifyCurrentPwd"></span>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="new_pwd" class="form-label">New Password</label>
                                                <input type="password" class="form-control" name="new_pwd" id="new_pwd"
                                                    placeholder="New Password">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="confirm_pwd" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd"
                                                    placeholder="Confirm Password">
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