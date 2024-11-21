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
                                            <li class="breadcrumb-item active">Users!</li>
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
                                @if ($usersModule['edit_access']==1 || $usersModule['full_access']==1)
                                <div class="card-header">
                                    <h1 class="header-title">Users</h1>
                                    <!--<a style="max-width: 150px; float: right; display: inline-block;" href="{{ url('admin/add-edit-user') }}" class="btn btn-block btn-primary">Add User</a>-->
                                    <br><br>
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
                                    <table id="users" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Country</th>
                                                <th>Pincode</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Registered On</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as  $user)
                                            <tr>
                                                <td>{{ $user['id'] }}</td>
                                                <td>{{ $user['name'] }}</td>
                                                <td>{{ $user['address'] }}</td>
                                                <td>{{ $user['city'] }}</td>
                                                <td>{{ $user['state'] }}</td>
                                                <td>{{ $user['country'] }}</td>
                                                <td>{{ $user['pincode'] }}</td>
                                                <td>{{ $user['mobile'] }}</td>
                                                <td>{{ $user['email'] }}</td>
                                                <td>{{ date("F j, Y, g:i a", strtotime($user['created_at'] )) }}</td>
                                                <td>
                                                    @if ($usersModule['edit_access']==1 || $usersModule['full_access']==1)
                                                    @if($user['status']==1)
                                                        <a class="updateUserStatus" id="user-{{ $user['id'] }}" user_id="{{ $user['id'] }}" style="color: #5BD1D7; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch" status="Active"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @else
                                                        <a class="updateUserStatus" id="user-{{ $user['id'] }}" user_id="{{ $user['id'] }}" style="color: red; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch-off" status="Inactive"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @endif
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