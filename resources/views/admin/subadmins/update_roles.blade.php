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

                                    @if(Session::has('success_message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Success:</strong> {{ Session::get('success_message') }}
                                            <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>-->
                                        </div>
                                    @endif
                                         
                                    <form name="subadminForm" id="subadminForm" action="{{ url('admin/update-role/'.$id) }}"
                                    method="post">@csrf
                                    <input type="hidden" name="subadmin_id" value="{{ $id }}">
                                    @if(!empty($subadminRoles))
                                    @foreach ($subadminRoles as $role )
                                       @if($role['module']=="cms_pages")
                                       @if($role['view_access']==1)
                                            @php $viewCMSPages = "checked" @endphp
                                       @else
                                            @php $viewCMSPages = "" @endphp
                                       @endif
                                       @if($role['edit_access']==1)
                                            @php $editCMSPages = "checked" @endphp
                                       @else
                                            @php $editCMSPages = "" @endphp
                                       @endif
                                       @if($role['full_access']==1)
                                            @php $fullCMSPages = "checked" @endphp
                                       @else
                                            @php $fullCMSPages = "" @endphp
                                       @endif
                                       @endif
                                       @if($role['module']=="categories")
                                       @if($role['view_access']==1)
                                            @php $viewCategories = "checked" @endphp
                                       @else
                                            @php $viewCategories = "" @endphp
                                       @endif
                                       @if($role['edit_access']==1)
                                            @php $editCategories = "checked" @endphp
                                       @else
                                            @php $editCategories = "" @endphp
                                       @endif
                                       @if($role['full_access']==1)
                                            @php $fullCategories = "checked" @endphp
                                       @else
                                            @php $fullCategories = "" @endphp
                                       @endif
                                       @endif

                                       @if($role['module']=="products")
                                       @if($role['view_access']==1)
                                            @php $viewProducts = "checked" @endphp
                                       @else
                                            @php $viewProducts = "" @endphp
                                       @endif
                                       @if($role['edit_access']==1)
                                            @php $editProducts = "checked" @endphp
                                       @else
                                            @php $editProducts = "" @endphp
                                       @endif
                                       @if($role['full_access']==1)
                                            @php $fullProducts = "checked" @endphp
                                       @else
                                            @php $fullProducts = "" @endphp
                                       @endif
                                       @endif

                                       <!-- Brands Rules-->
                                        @if($role['module']=="brands")
                                       @if($role['view_access']==1)
                                            @php $viewBrands = "checked" @endphp
                                       @else
                                            @php $viewBrands = "" @endphp
                                       @endif
                                       @if($role['edit_access']==1)
                                            @php $editBrands = "checked" @endphp
                                       @else
                                            @php $editBrands = "" @endphp
                                       @endif
                                       @if($role['full_access']==1)
                                            @php $fullBrands = "checked" @endphp
                                       @else
                                            @php $fullBrands = "" @endphp
                                       @endif
                                       @endif
                                    @endforeach
                                    @endif
                                    <div class="card-body">
                                    <div class="form-group col-md-6">
                                        <label style="color: #5BD1D7;" for="cms_pages">CMS Page:</label>&nbsp;&nbsp;&nbsp;<br><br>
                                        <input type="checkbox" name="cms_pages[view]" value="1" @if(isset($viewCMSPages)) {{ $viewCMSPages }} @endif>&nbsp;&nbsp; View Access &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="cms_pages[edit]" value="1" @if(isset($editCMSPages)) {{ $editCMSPages }} @endif>&nbsp;&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="cms_pages[full]" value="1" @if(isset($fullCMSPages)) {{ $fullCMSPages }} @endif>&nbsp;&nbsp;Full &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="margin-top: 30px; color: #5BD1D7;" for="categories">Categories:</label>&nbsp;&nbsp;&nbsp;<br><br>
                                        <input type="checkbox" name="categories[view]" value="1" @if(isset($viewCategories)) {{ $viewCategories }} @endif>&nbsp;&nbsp; View Access &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="categories[edit]" value="1" @if(isset($editCategories)) {{ $editCategories }} @endif>&nbsp;&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="categories[full]" value="1" @if(isset($fullCategories)) {{ $fullCategories }} @endif>&nbsp;&nbsp;Full &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="margin-top: 30px; color: #5BD1D7;" for="products">Products:</label>&nbsp;&nbsp;&nbsp;<br><br>
                                        <input type="checkbox" name="products[view]" value="1" @if(isset($viewProducts)) {{ $viewProducts }} @endif>&nbsp;&nbsp; View Access &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="products[edit]" value="1" @if(isset($editProducts)) {{ $editProducts }} @endif>&nbsp;&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="products[full]" value="1" @if(isset($fullProducts)) {{ $fullProducts }} @endif>&nbsp;&nbsp;Full &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label style="margin-top: 30px; color: #5BD1D7;" for="products">Brands:</label>&nbsp;&nbsp;&nbsp;<br><br>
                                        <input type="checkbox" name="brands[view]" value="1" @if(isset($viewBrands)) {{ $viewBrands }} @endif>&nbsp;&nbsp; View Access &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="brands[edit]" value="1" @if(isset($editBrands)) {{ $editBrands }} @endif>&nbsp;&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="brands[full]" value="1" @if(isset($fullBrands)) {{ $fullBrands }} @endif>&nbsp;&nbsp;Full &nbsp;&nbsp;&nbsp;
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