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
                                            <li class="breadcrumb-item active">Cms Page!</li>
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
                                <div class="card-header">
                                    <h1 class="header-title">CMS Pages</h1>
                                    @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                    <a style="max-width: 150px; float: right; display: inline-block;" href="{{ url('admin/add-edit-cms-page') }}" class="btn btn-block btn-primary">Add CMS Page</a><br><br>
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
                                    <table id="cmspages" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Url</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($CmsPages as  $page)
                                            <tr>
                                                <td>{{ $page['id'] }}</td>
                                                <td>{{ $page['title'] }}</td>
                                                <td>{{ $page['url'] }}</td>
                                                <td>{{ date("F j, Y, g:i a", strtotime($page['created_at'] )) }}</td>
                                                <td>
                                                    @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                                    @if($page['status']==1)
                                                        <a class="updateCmsPageStatus" id="page-{{ $page['id'] }}" page_id="{{ $page['id'] }}" style="color: #5BD1D7; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch" status="Active"></i></a>&nbsp;&nbsp;&nbsp;
                                                    @else
                                                        <a class="updateCmsPageStatus" id="page-{{ $page['id'] }}" page_id="{{ $page['id'] }}" style="color: red; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch-off" status="Inactive"></i></a>&nbsp;&nbsp;&nbsp;
                                                    @endif
                                                    @endif
                                                    @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                                        <a style="font-size:30px;" href="{{ url('admin/add-edit-cms-page/'.$page['id'])}}"><i class="ri-edit-fill"></i></a>&nbsp;&nbsp;&nbsp;
                                                    @endif
                                                     @if ($pagesModule['full_access']==1)
                                                        <a style="font-size:30px;" class="confirmDelete" name="CMS Page" title="Delete Cms Page" href="javascript:void(0)" record="cms-page" recordid="{{ $page['id'] }}" <?php /*href="{{ url('admin/delete-cms-page/'.$page['id'])}}"*/ ?>><i class="ri-delete-bin-5-line"></i></a>
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