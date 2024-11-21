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
                                            <li class="breadcrumb-item active">Edit Products!</li>
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
                                    <h4 class="header-title">Edit Product</h4>
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
                                         
                                    <form name="productForm" id="productForm" @if (empty($product['id'])) action="{{ url('admin/add-edit-product') }}" @else
                                    action="{{ url('admin/add-edit-product/'.$product['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-12">
                                                <label for="category_id" class="form-label">Select Category Level*</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach($getCategories as $cat)
                                                        <option style="color: green;" @if(!empty(@old('category_id')) && $cat['id']==@old('category_id')) selected="" @elseif(!empty($product['category_id'] && $product['category_id'])==$cat['id']) selected="" @endif value="{{ $cat['id'] }}">{{ $cat['category_name'] }}</option>
                                                        @if(!empty($cat['subcategories']))
                                                          @foreach($cat['subcategories'] as $subcat)
                                                           <option style="color: #E212A1;" @if(!empty(@old('category_id')) && $subcat['id']==@old('category_id')) selected="" @elseif(!empty($product['category_id'] && $product['category_id'])==$subcat['id']) selected="" @endif value="{{ $subcat['id'] }}">>>{{ $subcat['category_name'] }}</option>
                                                            @if(!empty($subcat['subcategories']))
                                                              @foreach($subcat['subcategories'] as $subsubcat)
                                                                <option style="color: violet;" @if(!empty(@old('category_id')) && $subsubcat['id'] == @old('category_id')) selected="" @elseif(!empty($product['category_id'] && $product['category_id'])==$subsubcat['id']) selected="" @endif value="{{ $subsubcat['id'] }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>{{ $subsubcat['category_name'] }}</option>
                                                              @endforeach
                                                            @endif
                                                          @endforeach
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="brand_id" class="form-label">Select Brand*</label>
                                                  <select name="brand_id" id="brand_id" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach($getBrands as $brand)
                                                     <option value="{{ $brand['id'] }}"@if(!empty($product['brand_id']) && $product['brand_id']==$brand['id']) selected="" @endif>{{ $brand['brand_name'] }}</option>
                                                    @endforeach
                                                  </select>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="product_discount" class="form-label">Product Name*</label>
                                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" @if(!empty($product['product_name'])) value="{{ $product['product_name'] }}" @else
                                                  value="{{ @old('product_name') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="product_code" class="form-label">Product Code*</label>
                                                <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Product Code" @if(!empty($product['product_code'])) value="{{ $product['product_code'] }}" @else
                                                  value="{{ @old('product_code') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="product_color" class="form-label">Product Color*</label>
                                                <input type="text" class="form-control" id="product_color" name="product_color" placeholder="Enter Product Color" @if(!empty($product['product_color'])) value="{{ $product['product_color'] }}" @else
                                                  value="{{ @old('product_color') }}" @endif>
                                            </div>
                                            @php
                                            $familyColors = \App\Models\Color::colors()
                                            @endphp
                                            <div class="mb-3 col-md-12">
                                                <label for="family_color" class="form-label">Family Color*</label>
                                                <select name="family_color" id="" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($familyColors as $color)
                                                  <option value="{{ $color['color_name'] }}" @if(!empty(@old('family_color')) && @old('family_color') == $color['color_name']) selected="" @elseif(!empty($product['family_color'] && $product['family_color']) == $color['color_name']) selected="" @endif>{{ $color['color_name'] }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="group_code" class="form-label">Group Code*</label>
                                                <input type="text" class="form-control" id="group_code" name="group_code" placeholder="Enter Group Code" @if(!empty($product['group_code'])) value="{{ $product['group_code'] }}" @else
                                                  value="{{ @old('group_code') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="product_price" class="form-label">Product Price*</label>
                                                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Product Price" @if(!empty($product['product_price'])) value="{{ $product['product_price'] }}" @else
                                                  value="{{ @old('product_price') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="product_discount" class="form-label">Product Discount (%)*</label>
                                                <input type="text" class="form-control" id="product_discount" name="product_discount" placeholder="Enter Product Discount (%)" @if(!empty($product['product_discount'])) value="{{ $product['product_discount'] }}" @else
                                                  value="{{ @old('product_discount') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="product_weight" class="form-label">Product Weight*</label>
                                                <input type="text" class="form-control" id="product_weight" name="product_weight" placeholder="Enter Product Weight" @if(!empty($product['product_weight'])) value="{{ $product['product_weight'] }}" @else
                                                  value="{{ @old('product_weight') }}" @endif>
                                            </div>
                                            
                                            <div class="mb-3 col-md-12">
                                                <label for="product_images" class="form-label">Product Images* ( Recommed Size:1040 X 1200)</label>
                                                <input type="file" class="form-control" id="product_images" name="product_images[]" multiple="">  &nbsp;&nbsp;&nbsp;
                                                <table cellpadding="10" cellspacing="10" border="1" style="margin:10px">
                                                <tr> 
                                                @foreach ($product['images'] as $image)
                                                <td style="background-color:#f9f9f9;">
                                                    <a target="_blank" href="{{ url('front/images/products/large/'.$image['image']) }}"><img style="width:90px;" src="{{ asset('front/images/products/small/'.$image['image']) }}"></a>&nbsp;&nbsp;&nbsp;
                                                    <input type="hidden" name="image[]" value="{{ $image['image'] }}">
                                                    <input style="width: 30px;" type="text" name="image_sort[]" value="{{ $image['image_sort'] }}">&nbsp;&nbsp;&nbsp;
                                                    <a style="font-size:30px;" class="confirmDelete" title="Delete Product Image" href="javascript:void(0)" record="product-image" recordid="{{ $image['id'] }}" ><i class="ri-delete-bin-5-line"></i></a>&nbsp;&nbsp;&nbsp;
                                                     </td>
                                                @endforeach
                                            </tr>
                                            </table>
                                            </div>
                                            
                                            <div class="mb-3 col-md-12">
                                                <label for="product_video" class="form-label">Product Video*</label>
                                                <input type="file" class="form-control" id="product_video" name="product_video" ><br>  &nbsp;&nbsp;&nbsp;
                                                @if(!empty($product['product_video']))
                                                    <a target="_blank" href="{{ url('front/videos/products/'.$product['product_video']) }}">View Video</a> &nbsp;&nbsp;&nbsp; |  &nbsp;&nbsp;&nbsp;
                                                    <a class="confirmDelete" title="Delete Product Video" href="javascript:void(0)" record="product-video" recordid="{{ $product['id'] }}" > Delete Video</a>
                                                @endif
                                            </div>

                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">View Added Attributes*</label>
                                                   <table style="background-color:white; width:50%;" cellpadding="5">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>SIZE</th>
                                                        <th>SKU</th>
                                                        <th>PRICE</th>
                                                        <th>STOCK</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach($product['Attributes'] as $attribute)
                                                    <input type="hidden" name="attributeId[]" value="{{ $attribute['id'] }}">
                                                    <tr>
                                                        <td>{{ $attribute['id'] }}</td>
                                                        <td>{{ $attribute['size'] }}</td>
                                                        <td>{{ $attribute['sku'] }}</td>
                                                        <td>
                                                        <input style="width: 100px;" type="number" name="price[]" value="{{ $attribute['price'] }}">
                                                        </td>
                                                        <td>
                                                        <input style="width: 100px;" type="number" name="stock[]" value="{{ $attribute['stock'] }}">
                                                        </td>
                                                        <td>
                                                        @if($attribute['status']==1)
                                                                <a class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" style="color: #5BD1D7; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch" status="Active"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            @else
                                                                <a class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" style="color: red; font-size:40px;" href="javascript:void(0)"><i class="mdi mdi-toggle-switch-off" status="Inactive"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            @endif
                                                                <a style="font-size:30px;" class="confirmDelete" title="Delete Attribute" href="javascript:void(0)" record="attribute" recordid="{{ $attribute['id'] }}" ><i class="ri-delete-bin-5-line"></i></a>&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                   </table>
                                            </div>
                                            
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Add Products Attributes*</label>
                                             <div class="row">
                                                    <div class="col-lg-12">
                                                        <div id="inputFormRow">
                                                            <div class="input-group mb-3">
                                                                <input type="text" name="size[]" id="size" class="form-control m-input" placeholder="Enter Size" autocomplete="on">
                                                                <input type="text" name="sku[]" id="sku" class="form-control m-input" placeholder="Enter SKU" autocomplete="on">
                                                                <input type="text" name="price[]" id="price" class="form-control m-input" placeholder="Enter PRICE" autocomplete="on">
                                                                <input type="text" name="stock[]" id="stock" class="form-control m-input" placeholder="Enter STOCK" autocomplete="on">
                                                                <div class="input-group-append">
                                                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="newRow"></div>
                                                        <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                                                    </div>
                                            </div>        
                                            </div>

                                            <div class="mb-3 col-md-12">
                                                <label for="fabric" class="form-label">Fabric*</label>
                                                <select name="fabric" id="" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($productsFilters['fabricArray'] as $fabric)
                                                 <option value="{{ $fabric }}" @if(!empty(@old('fabric')) && @old('fabric') == $fabric) selected="" @elseif(!empty($product['fabric'] && $product['fabric']) == $fabric) selected="" @endif>{{ $fabric }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="sleeve" class="form-label">Sleeve*</label>
                                                <select name="sleeve" id="" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($productsFilters['sleeveArray'] as $sleeve)
                                                 <option value="{{ $sleeve }}" @if(!empty(@old('sleeve')) && @old('sleeve') == $sleeve) selected="" @elseif(!empty($product['sleeve'] && $product['sleeve']) == $sleeve) selected="" @endif>{{ $sleeve }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="pattern" class="form-label">Pattern*</label>
                                                <select name="pattern" id="" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($productsFilters['patternArray'] as $pattern)
                                                 <option value="{{ $pattern }}" @if(!empty(@old('pattern')) && @old('pattern') == $pattern) selected="" @elseif(!empty($product['pattern'] && $product['pattern']) == $pattern) selected="" @endif>{{ $pattern }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="fit" class="form-label">Fit*</label>
                                                <select name="fit" id="" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($productsFilters['fitArray'] as $fit)
                                                 <option value="{{ $fit }}" @if(!empty(@old('fit')) && @old('fit') == $fit) selected="" @elseif(!empty($product['fit'] && $product['fit']) == $fit) selected="" @endif>{{ $fit }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="occasion" class="form-label">Occasion*</label>
                                                <select name="occasion" id="" class="form-control">
                                                <option value="">Select</option>
                                                @foreach($productsFilters['occasionArray'] as $occasion)
                                                 <option value="{{ $occasion }}" @if(!empty(@old('occasion')) && @old('occasion') == $occasion) selected="" @elseif(!empty($product['occasion'] && $product['occasion']) == $occasion) selected="" @endif>{{ $occasion }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <?php /*<div class="mb-3 col-md-12">
                                                <label for="product_image" class="form-label">Product Image*</label>
                                                <input type="file" class="form-control" id="product_image" name="product_image" >
                                                @if(!empty($product['product_image']))
                                                   <a target="_blank" href="{{url('front/images/categories/'.$product['product_image']) }}"><img style="width: 150px; margin-top: 25px;" src="{{ asset('front/images/categories/'.$product['product_image']) }}"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                   <a style="font-size:30px; margin-bottom: 115px;" class="confirmDelete" title="Delete Product Image" href="javascript:void(0)" record="product-image" recordid="{{ $product['id'] }}" ><i class="ri-delete-bin-5-line"></i></a>
                                                   @endif
                                            </div>*/ ?>
                                        </div>
                                         <h5 class="mb-3 mt-4">Description*</h5>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Enter Product Discription"
                                                    id="description" name="description" style="height: 100px" >@if(!empty($product['description'])) {{ $product['description'] }} @else
                                                  {{ @old('description') }} @endif</textarea>
                                                <label for="description" >Enter Description</label>
                                            </div>
                                            <br>
                                            <h5 class="mb-3 mt-4">Wash Care*</h5>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Enter Product Discription"
                                                    id="wash_care" name="wash_care" style="height: 100px" > @if(!empty($product['wash_care'])) {{ $product['wash_care'] }} @else
                                                  {{ @old('wash_care') }} @endif</textarea>
                                                <label for="wash_care">Enter Wash Care</label>
                                            </div>
                                            <h5 class="mb-3 mt-4">Search Keywords*</h5>
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Enter Product Discription"
                                                    id="search_keywords" name="search_keywords" style="height: 100px" > @if(!empty($product['search_keywords'])) {{ $product['search_keywords'] }} @else
                                                  {{ @old('search_keywords') }} @endif</textarea>
                                                <label for="search_keywords">Enter Search Keywords</label>
                                            </div>
                                            <br>
                                            <div class="mb-3">
                                            <label for="meta_title" class="form-label">Meta Title*</label>
                                            <input type="text" class="form-control" name="meta_title" id="meta_title"
                                                placeholder="Enter Meta Title" @if(!empty($product['meta_title'])) value="{{ $product['meta_title'] }}" @else
                                                  value="{{ @old('meta_title') }}" @endif>
                                        </div>
                                        <br>
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-12">
                                                <label for="meta_description" class="form-label">Meta Description*</label>
                                                <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description" @if(!empty($product['meta_description'])) value="{{ $product['meta_description'] }}" @else
                                                  value="{{ @old('meta_description') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="meta_keywords" class="form-label">Meta Keywords*</label>
                                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" @if(!empty($product['meta_keywords'])) value="{{ $product['meta_keywords'] }}" @else
                                                  value="{{ @old('meta_keywords') }}" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="is_featured" class="form-label">Featured Item*</label>
                                                <input type="checkbox" name="is_featured" value="Yes" @if(!empty($product['is_featured']) && $product['is_featured']=="Yes") checked="" @endif>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="is_bestseller" class="form-label">Best Seller*</label>
                                                <input type="checkbox" name="is_bestseller" value="Yes" @if(!empty($product['is_bestseller']) && $product['is_bestseller']=="Yes") checked="" @endif>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
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