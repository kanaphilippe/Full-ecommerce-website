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
                                            <li class="breadcrumb-item active">Subscribers!</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome<strong>{{ Auth::guard('admin')->user()->name}} ({{Auth::guard('admin')->user()->type}})!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                         <div class="row">
                        <div class="col-12">  
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="header-title">Subscribers</h1>
                                    <a style="max-width: 150px; float: right; display: inline-block;" href="{{ url('admin/export-subscribers') }}" class="btn btn-block btn-primary">Export Subscriber</a>
                                    <br><br>
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
                                    <table id="subscribers" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>email</th>
                                                <th>Registered On</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subscribers as $subscriber)
                                            <tr>
                                                <td>{{ $subscriber['id'] }}</td>
                                                <td>{{ $subscriber['email'] }}</td>
                                                <td>{{ date("F j, Y, g:i a", strtotime($subscriber['created_at'] )) }}</td>
                                                <td>
                                                    @if($subscriber['status']==1)
                                                        <a class="updateSubscriberStatus" id="subscriber-{{ $subscriber['id'] }}" subscriber_id="{{ $subscriber['id'] }}" style="color: #5BD1D7; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch" status="Active"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @else
                                                        <a class="updateSubscriberStatus" id="subscriber-{{ $subscriber['id'] }}" subscriber_id="{{ $subscriber['id'] }}" style="color: red; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch-off" status="Inactive"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @endif
                                                    <a style="font-size:30px;" class="confirmDelete" title="Delete Subscriber" href="javascript:void(0)" record="subscriber" recordid="{{ $subscriber['id'] }}" ><i class="ri-delete-bin-5-line"></i></a>&nbsp;&nbsp;&nbsp;
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