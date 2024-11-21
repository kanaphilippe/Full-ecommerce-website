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
                                            <li class="breadcrumb-item active">Add Category!</li>
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
                                    <h4 class="header-title">Add Category</h4>
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
                                         
                                    <form name="categoryForm" id="categoryForm" @if (empty($category['id'])) action="{{ url('admin/add-edit-category') }}" @else
                                    action="{{ url('admin/add-edit-category/'.$category['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-12">
                                                <label for="category_name" class="form-label">Category Name*</label>
                                                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name" @if(!empty($category['category_name'])) value="{{ $category['category_name'] }}" @else value="{{ old('category_name') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="category_name" class="form-label">Category Level*</label>
                                                <select name="parent_id" id="" class="form-control">
                                                    <option value="">Select</option>
                                                    <option style="color: yellow;" value="0" @if($category['parent_id']==0) selected="" @endif>Main Category</option>
                                                    @foreach($getCategories as $cat)
                                                        <option style="color: green;" @if(isset($category['parent_id']) && $category['parent_id']==$cat['id']) selected @endif value="{{ $cat['id'] }}">{{ $cat['category_name'] }}</option>
                                                        @if(!empty($cat['subcategories']))
                                                          @foreach($cat['subcategories'] as $subcat)
                                                           <option style="color: #E212A1;" @if(isset($category['parent_id']) && $category['parent_id']==$subcat['id']) selected @endif value="{{ $subcat['id'] }}">>>{{ $subcat['category_name'] }}</option>
                                                            @if(!empty($subcat['subcategories']))
                                                              @foreach($subcat['subcategories'] as $subsubcat)
                                                                <option style="color: violet;" value="{{ $subsubcat['id'] }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>{{ $subsubcat['category_name'] }}</option>
                                                              @endforeach
                                                            @endif
                                                          @endforeach
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="category_image" class="form-label">Category Image*</label>
                                                <input type="file" class="form-control" id="category_image" name="category_image" >
                                                @if(!empty($category['category_image']))
                                                   <a target="_blank" href="{{url('front/images/categories/'.$category['category_image']) }}"><img style="width: 150px; margin-top: 25px;" src="{{ asset('front/images/categories/'.$category['category_image']) }}"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                   <a style="font-size:30px; margin-bottom: 115px;" class="confirmDelete" title="Delete Category Image" href="javascript:void(0)" record="category-image" recordid="{{ $category['id'] }}" ><i class="ri-delete-bin-5-line"></i></a>
                                                   @endif
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="category_discount" class="form-label">Category Discount*</label>
                                                <input type="text" class="form-control" id="category_discount" name="category_discount" placeholder="Enter Category Discount" @if(!empty($category['category_discount'])) value="{{ $category['category_discount'] }}" @else value="{{ old('category_discount') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="url" class="form-label">Category URL*</label>
                                                <input type="text" class="form-control" id="url" name="url" placeholder="Enter Category URL" @if(!empty($category['url'])) value="{{ $category['url'] }}" @else value="{{ old('url') }}" @endif>
                                            </div>
                                        </div>
                                         <h5 class="mb-3 mt-4">Category Description*</h5>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Enter Category Discription"
                                                    id="description" name="description" style="height: 100px" >@if(!empty($category['description'])) {{ $category['description'] }} @else {{ old('description') }} @endif</textarea>
                                                <label for="description">Enter Description</label>
                                            </div>
                                            <br>
                                        <div class="mb-3">
                                            <label for="meta_title" class="form-label">Meta Title*</label>
                                            <input type="text" class="form-control" name="meta_title" id="meta_title"
                                                placeholder="Enter Meta Title" @if(!empty($category['meta_title'])) value="{{ $category['meta_title'] }}" @else value="{{ old('meta_title') }}" @endif>
                                        </div>
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-12">
                                                <label for="meta_description" class="form-label">Meta Description*</label>
                                                <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description" @if(!empty($category['meta_description'])) value="{{ $category['meta_description'] }}" @else value="{{ old('meta_description') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="meta_keywords" class="form-label">Meta Keywords*</label>
                                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" @if(!empty($category['meta_keywords'])) value="{{ $category['meta_keywords'] }}" @else value="{{ old('meta_keywords') }}" @endif>
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