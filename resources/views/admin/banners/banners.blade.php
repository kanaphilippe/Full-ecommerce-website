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
                                            <li class="breadcrumb-item active">Banners!</li>
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
                                @if ($bannersModule['edit_access']==1 || $bannersModule['full_access']==1)
                                <div class="card-header">
                                    <h1 class="header-title">Banners</h1>
                                    <a style="max-width: 150px; float: right; display: inline-block;" href="{{ url('admin/add-edit-banner') }}" class="btn btn-block btn-primary">Add Banners</a><br><br>
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
                                    <table id="banners" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Type</th>
                                                <th>Link</th>
                                                <th>Title</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banners as  $banner)
                                            <tr>
                                                <td>{{ $banner['id'] }}</td>
                                                <td><a target="_blank" href="{{ url('front/images/banners/'.$banner['image'])}}"><img style="width:180px;" src="{{ asset('front/images/banners/'.$banner['image']) }}"></a></td>
                                                <td>{{ $banner['type'] }}</td>
                                                <td>{{ $banner['link'] }}</td>
                                                <td>{{ $banner['title'] }}</td>
                                                <td>
                                                   @if ($bannersModule['edit_access']==1 || $bannersModule['full_access']==1)
                                                    @if($banner['status']==1)
                                                        <a class="updateBannerStatus" id="banner-{{ $banner['id'] }}" banner_id="{{ $banner['id'] }}" style="color: #5BD1D7; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch" status="Active"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @else
                                                        <a class="updateBannerStatus" id="banner-{{ $banner['id'] }}" banner_id="{{ $banner['id'] }}" style="color: red; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch-off" status="Inactive"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @endif
                                                    @endif
                                                    @if ($bannersModule['edit_access']==1 || $bannersModule['full_access']==1)
                                                    <a style="font-size:30px;" href="{{ url('admin/add-edit-banner/'.$banner['id'])}}"><i class="ri-edit-fill"></i></a>
                                                    @endif
                                                    @if ($bannersModule['full_access']==1)
                                                        <a style="font-size:30px;" class="confirmDelete" title="Delete Banner" href="javascript:void(0)" record="banner" recordid="{{ $banner['id'] }}" ><i class="ri-delete-bin-5-line"></i></a>&nbsp;&nbsp;&nbsp;
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