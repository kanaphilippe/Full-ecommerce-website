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
                                            <li class="breadcrumb-item active">Products!</li>
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
                                     @if ($productsModule['edit_access']==1 || $productsModule['full_access']==1)
                                    <h1 class="header-title">Products</h1>
                                    <a style="max-width: 150px; float: right; display: inline-block;" href="{{ url('admin/add-edit-product') }}" class="btn btn-block btn-primary">Add Products</a><br><br>
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
                                    <table id="products" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Product Color</th>
                                                <th>Category</th>
                                                <th>Parent Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as  $product)
                                            <tr>
                                                <td>{{ $product['id'] }}</td>
                                                <td>{{ $product['product_name'] }}</td>
                                                <td>{{ $product['product_code'] }}</td>
                                                <td>{{ $product['product_color'] }}</td>
                                                <td>{{ $product['category']['category_name'] }}</td>
                                                <td>
                                                    @if (isset($product['category']['parentcategory']['category_name']))
                                                        {{ $product['category']['parentcategory']['category_name']}}
                                                    @endif
                                                </td>
                                                <td>
                                                     @if ($productsModule['edit_access']==1 || $productsModule['full_access']==1)
                                                    @if($product['status']==1)
                                                        <a class="updateProductStatus" id="product-{{ $product['id'] }}" product_id="{{ $product['id'] }}" style="color: #5BD1D7; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch" status="Active"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @else
                                                        <a class="updateProductStatus" id="product-{{ $product['id'] }}" product_id="{{ $product['id'] }}" style="color: red; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch-off" status="Inactive"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @endif
                                                    @endif
                                                    @if ($productsModule['edit_access']==1 || $productsModule['full_access']==1)
                                                    
                                                    <a style="font-size:30px;" href="{{ url('admin/add-edit-product/'.$product['id'])}}"><i class="ri-edit-fill"></i></a>
                                                      
                                                       @endif
                                                        @if ($productsModule['full_access']==1) 
                                                        <a style="font-size:30px;" class="confirmDelete" title="Delete Product" href="javascript:void(0)" record="product" recordid="{{ $product['id'] }}" ><i class="ri-delete-bin-5-line"></i></a>&nbsp;&nbsp;&nbsp;
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