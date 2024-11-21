<?php 
use App\Models\ProductsFilters; 
use App\Models\Category;
// Get Categories and thier Sub
//$url = Route::getFacadeRoot()->current()->uri;
$categories = Category::getCategories();
$categoryDetails = Category::categoryDetails($url);
?>
<div class="shop-area mb-20">
    <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="product-widget mb-30">
                        <h5 class="pt-title">Product categories</h5>
                        <div class="widget-category-list mt-20">
                            <form action="#">
                                <div class="single-widget-category">
                                    <input type="checkbox" id="cat-item-1" name="cat-item">
                                    <label for="cat-item-1">Clothing &amp; Apparel <span>(12)</span></label>
                                </div>
                                <div class="single-widget-category">
                                    <input type="checkbox" id="cat-item-2" name="cat-item">
                                    <label for="cat-item-2">Consumer Electrics <span>(60)</span></label>
                                </div>
                                <div class="single-widget-category">
                                    <input type="checkbox" id="cat-item-3" name="cat-item">
                                    <label for="cat-item-3">Computers &amp; Technologies <span>(41)</span></label>
                                </div>
                                <div class="single-widget-category">
                                    <input type="checkbox" id="cat-item-4" name="cat-item">
                                    <label for="cat-item-4">Phones &amp; Accessories <span>(28)</span></label>
                                </div>
                                <div class="single-widget-category">
                                    <input type="checkbox" id="cat-item-5" name="cat-item">
                                    <label for="cat-item-5">Babies &amp; Moms <span>(21)</span></label>
                                </div>
                                <div class="single-widget-category">
                                    <input type="checkbox" id="cat-item-7" name="cat-item">
                                    <label for="cat-item-7">Books &amp; Office <span>(62)</span></label>
                                </div>
                                <div class="single-widget-category">
                                    <input type="checkbox" id="cat-item-8" name="cat-item">
                                    <label for="cat-item-8">Sport &amp; Outdoo <span>(22)</span></label>
                                </div>
                                <div class="single-widget-category">
                                    <input type="checkbox" id="cat-item-9" name="cat-item">
                                    <label for="cat-item-9">Chairs &amp; Stools <span>(20)</span></label>
                                </div>
                                <div class="single-widget-category">
                                    <input type="checkbox" id="cat-item-10" name="cat-item">
                                    <label for="cat-item-10">Furniture &amp; Acessories <span>(06)</span></label>
                                </div>
                                <div class="single-widget-category">
                                    <input type="checkbox" id="cat-item-11" name="cat-item">
                                    <label for="cat-item-11">Kitchen &amp; Tableware <span>(30)</span></label>
                                </div>
                                <div class="single-widget-category">
                                    <input type="checkbox" id="cat-item-12" name="cat-item">
                                    <label for="cat-item-12">Lighting <span>(30)</span></label>
                                </div>
                                <div class="single-widget-category">
                                    <input type="checkbox" id="cat-item-13" name="cat-item">
                                    <label for="cat-item-13">Armchairs &amp; Chaises <span>(30)</span></label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="product-widget mb-30">
                        <h5 class="pt-title">Choose Price</h5>
                        <div class="widget-category-list mt-20">
                            <form >
                                <?php $getPrices = array('0-100','101-200','201-300','301-400','401-500','501-600','601-700','701-800','801-900','901-1000','1001-1100','1101-1200','1201-1300','1301-1400','1401-1500','1501-1600','1601-1700','1701-1800'); ?>
                                
                                <div class="single-widget-category"> 
                                    @foreach ($getPrices as $key => $price )
                                    <?php
                                if (isset($_GET['price'])&&!empty($_GET['price'])) {
                                    $prices = explode('~',$_GET['price']); 
                                    if(!empty($prices)&&in_array($price,$prices)){
                                        $pricechecked = "checked";
                                    }else{
                                        $pricechecked = "";
                                    }
                                }else{
                                    $pricechecked = "";
                                }
                                ?>
                                    <input type="checkbox" id="price{{$key}}" name="price" value="{{$price}}" class="filterAjax" {{$pricechecked}}>
                                    <label for="price{{$key}}">&nbsp;&nbsp;&nbsp;{{ $price }} <span></span></label>
                                    @endforeach
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <div class="product-widget mb-30">
                        <h5 class="pt-title">Choose Color</h5>
                        <div class="product__color mt-20">
                            <?php $getColors = ProductsFilters::getColors($categoryDetails['catIds']); ?>
                            <ul>
                                @foreach ($getColors as $key => $color ) 
                                <?php
                                if (isset($_GET['color']) && !empty($_GET['color'])) {
                                    $colors = explode('~', $_GET['color']); 
                                    if(!empty($colors)&&in_array($color,$colors)){
                                        $colorchecked = "checked";
                                    }else{
                                        $colorchecked = "";
                                    }
                                }else{
                                    $colorchecked = "";
                                }
                                ?>
                                <input type="checkbox" id="color{{$key}}" name="color" value="{{$color}}" class="filterAjax" {{$colorchecked}}>&nbsp;
                                <li>
                                    <a  style="background-color: {{$color}}" title="{{$color}}" value="{{$color}}" name="color" for="color{{$key}}" ></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="product-widget mb-30">
                        <h5 class="pt-title">Choose Rating</h5>
                        <div class="widget-category-list mt-20">
                            <form action="#">
                                <div class="single-widget-rating">
                                    <input type="checkbox" id="star-item-1" name="star-item">
                                    <label for="star-item-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>(54)</span>
                                    </label>
                                </div>
                                <div class="single-widget-rating">
                                    <input type="checkbox" id="star-item-2" name="star-item">
                                    <label for="star-item-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <span>(37)</span>
                                    </label>
                                </div>
                                <div class="single-widget-rating">
                                    <input type="checkbox" id="star-item-3" name="star-item">
                                    <label for="star-item-3">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <span>(7)</span>
                                    </label>
                                </div>
                                <div class="single-widget-rating">
                                    <input type="checkbox" id="star-item-4" name="star-item">
                                    <label for="star-item-4">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <span>(5)</span>
                                    </label>
                                </div>
                                <div class="single-widget-rating">
                                    <input type="checkbox" id="star-item-5" name="star-item">
                                    <label for="star-item-5">
                                        <i class="fas fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <i class="fal fa-star"></i>
                                        <span>(3)</span>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="product-widget mb-30">
                        <h5 class="pt-title">Choose Size</h5>
                        <div class="widget-category-list mt-20">
                            <form >
                                <?php $getSizes =ProductsFilters::getSizes($categoryDetails['catIds']); ?>
                                <div class="single-widget-category">
                                    @foreach ($getSizes as $key => $size )
                                    <?php
                                if (isset($_GET['size'])&&!empty($_GET['size'])) {
                                    $sizes = explode('~',$_GET['size']); 
                                    if(!empty($sizes)&&in_array($size, $sizes)){
                                        $sizechecked = "checked";
                                    }else{
                                        $sizechecked = "";
                                    }
                                }else{
                                    $sizechecked = "";
                                }
                                ?>
                                    <input type="checkbox" id="size{{$key}}" name="size" value="{{ $size }}" class="filterAjax" {{$sizechecked}}>
                                    <label for="size{{$key}}">{{ $size }}<span>(12)</span></label>
                                    @endforeach
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <?php $getDynamicFilters = ProductsFilters::getDynamicFilters($categoryDetails['catIds']); 
                                //dd($getDynamicFilters);
                                ?>
                                @foreach ($getDynamicFilters as $key => $filter )
                    <div class="product-widget mb-30">
                        <h5 class="pt-title">{{ucwords($filter)}}</h5>
                        <div class="widget-category-list mt-20">
                            <form >
                                <?php $filterValues = ProductsFilters::selectedFilters($filter,$categoryDetails['catIds']); 
                                //dd($getDynamicFilters);
                                ?>
                                <div class="single-widget-categoryk">
                                @foreach ($filterValues as $fkey => $filterValue )
                                @php
                                $checkFilter = ""
                                @endphp
                                @if (isset($_GET[$filter]))
                                @php $explodeFilters =explode('~',$_GET[$filter]) @endphp
                                @if (in_array($filterValue,$explodeFilters))
                                    @php $checkFilter = "checked" @endphp
                                @endif
                                @endif
                                    <input type="checkbox" id="filter{{$fkey}}" name="{{$filter}}" value="{{$filterValue}}" class="filterAjax" {{$checkFilter}}>
                                    <label for="filter{{$fkey}}">{{ $filterValue }}<span>(12)</span></label>
                                    @endforeach
                                </div> 
                            </form>
                        </div>
                    </div>
                    @endforeach
                    <div class="product-widget mb-30">
                        <h5 class="pt-title">Choose Brand</h5>
                        <div class="widget-category-list mt-20">
                            <form >
                                <?php $getBrands = ProductsFilters::getBrands($categoryDetails['catIds']); ?>
                                <div class="single-widget-category">
                                    @foreach ($getBrands as $key => $brand )
                                <?php
                                if (isset($_GET['brand'])&&!empty($_GET['brand'])) {
                                    $brands = explode('~',$_GET['brand']); 
                                    if(!empty($brands)&&in_array($brand['id'], $brands)){
                                        $brandchecked = "checked";
                                    }else{
                                        $brandchecked = "";
                                    }
                                }else{
                                    $brandchecked = "";
                                }
                                ?>
                                    <input type="checkbox" id="brand{{$key}}" name="brand" value="{{$brand['id']}}" class="filterAjax" {{$brandchecked}}>
                                    <label for="brand{{$key}}">{{ $brand['brand_name'] }}<span>(12)</span></label>
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </div>
            <div class="product-widget mb-30">
                <h5 class="pt-title">Special Offers</h5>
                <div class="product__sm mt-20">
                    <ul>
                        <li class="product__sm-item d-flex align-items-center">
                            <div class="product__sm-thumb mr-20">
                                <a href="product-details.html">
                                    <img src="assets/img/product/sm-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="product__sm-content">
                                <h5 class="product__sm-title">
                                    <a href="product-details.html">Classic Leather Backpack Daypack 2022</a>
                                </h5>
                                <div class="product__sm-price">
                                    <span class="price">$300.00</span>
                                </div>
                            </div>
                        </li>
                        <li class="product__sm-item d-flex align-items-center">
                            <div class="product__sm-thumb mr-20">
                                <a href="product-details.html">
                                    <img src="assets/img/product/sm-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="product__sm-content">
                                <h5 class="product__sm-title">
                                    <a href="product-details.html">Samsung Galaxy A12, 32GB, Black - (Locked)</a>
                                </h5>
                                <div class="product__sm-price">
                                    <span class="price">$150.00</span>
                                </div>
                            </div>
                        </li>
                        <li class="product__sm-item d-flex align-items-center">
                            <div class="product__sm-thumb mr-20">
                                <a href="product-details.html">
                                    <img src="assets/img/product/sm-3.jpg" alt="">
                                </a>
                            </div>
                            <div class="product__sm-content">
                                <h5 class="product__sm-title">
                                    <a href="#">Coffee Maker AH240a Full Function</a>
                                </h5>
                                <div class="product__sm-price">
                                    <span class="price">$300.00</span>
                                </div>
                            </div>
                        </li>
                        <li class="product__sm-item d-flex align-items-center">
                            <div class="product__sm-thumb mr-20">
                                <a href="product-details.html">
                                    <img src="assets/img/product/sm-4.jpg" alt="">
                                </a>
                            </div>
                            <div class="product__sm-content">
                                <h5 class="product__sm-title">
                                    <a href="product-details.html">Imported Wooden Felt Cushion Chair</a>
                                </h5>
                                <div class="product__sm-price">
                                    <span class="price">$120.00</span>
                                </div>
                            </div>
                        </li>
                        <li class="product__sm-item d-flex align-items-center">
                            <div class="product__sm-thumb mr-20">
                                <a href="product-details.html">
                                    <img src="assets/img/product/sm-5.jpg" alt="">
                                </a>
                            </div>
                            <div class="product__sm-content">
                                <h5 class="product__sm-title">
                                    <a href="product-details.html">Sunhouse Decorative Lights - Imported</a>
                                </h5>
                                <div class="product__sm-price">
                                    <span class="price">$110.00</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="shop-banner mb-30">
                <div class="banner-image">
                    <img class="banner-l" src="assets/img/banner/sl-banner.jpg" alt="">
                    <img class="banner-sm" src="assets/img/banner/sl-banner-sm.png" alt="">
                    <div class="banner-content text-center">
                        <p class="banner-text mb-30">Hurry Up! <br> Free Shipping All Order Over $99</p>
                        <a href="shop.html" class="st-btn-d b-radius">Discover now</a>
                    </div>
                </div>
            </div>
            <div class="product-lists-top">
                <div class="product__filter-wrap">
                    <div class="row align-items-center">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="product__filter d-sm-flex align-items-center">
                                <div class="product__col">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="FourCol-tab" data-bs-toggle="tab" data-bs-target="#FourCol" type="button" role="tab" aria-controls="FourCol" aria-selected="true">
                                            <i class="fal fa-th"></i>
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="FiveCol-tab" data-bs-toggle="tab" data-bs-target="#FiveCol" type="button" role="tab" aria-controls="FiveCol" aria-selected="false">
                                            <i class="fal fa-list"></i>
                                            </button>
                                        </li>
                                        </ul>
                                </div>
                                <div class="product__result pl-60">
                                    <p>Showing ({{count($categoryProducts) }}) Products</p>
                                </div>
                            </div>
                        </div>
                        @if (empty($_GET['query']))
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                <div class="product__filter-right d-flex align-items-center justify-content-md-end">
                                    <div class="product__sorting product__show-no">
                                        <select>
                                            <option>10</option>
                                            <option>20</option>
                                            <option>30</option>
                                            <option>40</option>
                                        </select>
                                    </div>
                                        <form name="sortProducts" id="sortProducts">@csrf
                                            <input type="hidden" name="url" id="url" value="{{ $url }}">
                                            <div class="product__sorting product__show-position ml-20">
                                                <!--<select name="sort" id="sort">
                                                    <option selected>Sort By: Newest Items</option>
                                                    <option value="product_latest">Sort By: Latest Items</option>
                                                    <option value="best_selling">Sort By: Best Selling</option>
                                                    <option value="best_rating">Sort By: Best Rating</option>
                                                    <option value="lowest_price">Sort By: Loest Price</option>
                                                    <option value="highest_price">Sort By: Highest Price</option>
                                                    <option value="featured_items">Sort By: Featured Items</option>
                                                    <option value="discounted_item">Sort By: Discounted Items</option>
                                                </select>-->
                                                <select name="sort" id="sort" class="getsort">
                                                    <option selected>Sort By: New Products</option>
                                                    <option value="product_latest" @if(isset($_GET['sort'])&&!empty($_GET['sort']) && $_GET['sort']=="product_latest") selected="" @endif>Sort By: Latest Product</option>
                                                    <option value="best_selling" @if(isset($_GET['sort'])&&!empty($_GET['sort']) && $_GET['sort']=="best_selling") selected="" @endif>Sort By: Best Selling</option>
                                                    <option value="best_rating" @if(isset($_GET['sort'])&&!empty($_GET['sort']) && $_GET['sort']=="best_rating") selected="" @endif>Sort By: Most Rating</option>
                                                    <option value="lowest_price" @if(isset($_GET['sort'])&&!empty($_GET['sort']) && $_GET['sort']=="lowest_price") selected="" @endif>Sort By: Lowest Price</option>
                                                    <option value="highest_price" @if(isset($_GET['sort'])&&!empty($_GET['sort']) && $_GET['sort']=="highest_price") selected="" @endif>Sort By: Highest Price</option>
                                                    <option value="featured_items" @if(isset($_GET['sort'])&&!empty($_GET['sort']) && $_GET['sort']=="featured_items") selected="" @endif>Sort By: Featured Product</option>
                                                    <option value="discounted_items" @if(isset($_GET['sort'])&&!empty($_GET['sort']) && $_GET['sort']=="discounted_items") selected="" @endif>Sort By: Discounted Products</option>
                                                </select>
                                                
                                            </div>
                                        </form> 

                                </div>
                            </div>
                        @endif
                    </div>
                    </div>
                    </div>
                    <div class="tab-content" id="productGridTabContent">
                        <div class="tab-pane fade  show active" id="FourCol" role="tabpanel" aria-labelledby="FourCol-tab">
                            <div class="tp-wrapper">
                                <div class="row g-0" id="appendProducts">
                                    @include('front.products.ajax_products_listing')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="FiveCol" role="tabpanel" aria-labelledby="FiveCol-tab">
                            <div class="tp-wrapper-2">
                                <div class="single-item-pd">
                                    <div class="row align-items-center">
                                        <div class="col-xl-9">
                                            <div class="single-features-item single-features-item-df b-radius mb-20">
                                                <div class="row  g-0 align-items-center">
                                                    <div class="col-md-4">
                                                        <div class="features-thum">
                                                            <div class="features-product-image w-img">
                                                                <a href="product-details.html"><img src="assets/img/product/sm-1.jpg" alt=""></a>
                                                            </div>
                                                            <div class="product__offer">
                                                                <span class="discount">-15%</span>
                                                            </div>
                                                            <div class="product-action">
                                                                <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-layer-group"></i>
                                                                    <i class="fal fa-layer-group"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product__content product__content-d">
                                                            <h6><a href="product-details.html">Classic Leather Backpack Daypack 2022</a></h6>
                                                            <div class="rating mb-5">
                                                                <ul class="rating-d">
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                </ul>
                                                                <span>(01 review)</span>
                                                            </div>
                                                            <div class="features-des">
                                                                <ul>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="product-stock mb-15">
                                                <h5>Availability: <span> 940 in stock</span></h5>
                                                <h6>$220.00 - <del> $240.00</del></h6>
                                            </div>
                                            <div class="stock-btn ">
                                                <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                Add to Cart
                                                </button>
                                                <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                    Quick View
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-item-pd">
                                    <div class="row align-items-center">
                                        <div class="col-xl-9">
                                            <div class="single-features-item single-features-item-df b-radius mb-20">
                                                <div class="row  g-0 align-items-center">
                                                    <div class="col-md-4">
                                                        <div class="features-thum">
                                                            <div class="features-product-image w-img">
                                                                <a href="product-details.html"><img src="assets/img/product/sm-2.jpg" alt=""></a>
                                                            </div>
                                                            <div class="product-action">
                                                                <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-layer-group"></i>
                                                                    <i class="fal fa-layer-group"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product__content product__content-d">
                                                            <h6><a href="product-details.html">Samsang Galaxy A70 128GB Dual-SIM</a></h6>
                                                            <div class="rating mb-5">
                                                                <ul class="rating-d">
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                </ul>
                                                                <span>(01 review)</span>
                                                            </div>
                                                            <div class="features-des">
                                                                <ul>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="product-stock mb-15">
                                                <h5>Availability: <span> 940 in stock</span></h5>
                                                <h6>$216.00</h6>
                                            </div>
                                            <div class="stock-btn ">
                                                <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                Add to Cart
                                                </button>
                                                <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                    Quick View
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-item-pd">
                                    <div class="row align-items-center">
                                        <div class="col-xl-9">
                                            <div class="single-features-item single-features-item-df b-radius mb-20">
                                                <div class="row  g-0 align-items-center">
                                                    <div class="col-md-4">
                                                        <div class="features-thum">
                                                            <div class="features-product-image w-img">
                                                                <a href="product-details.html"><img src="assets/img/product/sm-3.jpg" alt=""></a>
                                                            </div>
                                                            <div class="product-action">
                                                                <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-layer-group"></i>
                                                                    <i class="fal fa-layer-group"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product__content product__content-d">
                                                            <h6><a href="product-details.html">Coffee Maker AH240a Full Function</a></h6>
                                                            <div class="rating mb-5">
                                                                <ul class="rating-d">
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                </ul>
                                                                <span>(01 review)</span>
                                                            </div>
                                                            <div class="features-des">
                                                                <ul>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="product-stock mb-15">
                                                <h5>Availability: <span> 940 in stock</span></h5>
                                                <h6>$125.00</h6>
                                            </div>
                                            <div class="stock-btn ">
                                                <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                Add to Cart
                                                </button>
                                                <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                    Quick View
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-item-pd">
                                    <div class="row align-items-center">
                                        <div class="col-xl-9">
                                            <div class="single-features-item single-features-item-df b-radius mb-20">
                                                <div class="row  g-0 align-items-center">
                                                    <div class="col-md-4">
                                                        <div class="features-thum">
                                                            <div class="features-product-image w-img">
                                                                <a href="product-details.html"><img src="assets/img/product/sm-4.jpg" alt=""></a>
                                                            </div>
                                                            <div class="product-action">
                                                                <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-layer-group"></i>
                                                                    <i class="fal fa-layer-group"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product__content product__content-d">
                                                            <h6><a href="product-details.html">Imported Wooden Felt Cushion Chair</a></h6>
                                                            <div class="rating mb-5">
                                                                <ul class="rating-d">
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                </ul>
                                                                <span>(01 review)</span>
                                                            </div>
                                                            <div class="features-des">
                                                                <ul>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="product-stock mb-15">
                                                <h5>Availability: <span> 940 in stock</span></h5>
                                                <h6>$160.00</h6>
                                            </div>
                                            <div class="stock-btn ">
                                                <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                Add to Cart
                                                </button>
                                                <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                    Quick View
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-item-pd">
                                    <div class="row align-items-center">
                                        <div class="col-xl-9">
                                            <div class="single-features-item single-features-item-df b-radius mb-20">
                                                <div class="row  g-0 align-items-center">
                                                    <div class="col-md-4">
                                                        <div class="features-thum">
                                                            <div class="features-product-image w-img">
                                                                <a href="product-details.html"><img src="assets/img/product/sm-5.jpg" alt=""></a>
                                                            </div>
                                                            <div class="product__offer">
                                                                <span class="discount">-15%</span>
                                                            </div>
                                                            <div class="product-action">
                                                                <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-layer-group"></i>
                                                                    <i class="fal fa-layer-group"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product__content product__content-d">
                                                            <h6><a href="product-details.html">Sunhouse Decorative Lights – Imported</a></h6>
                                                            <div class="rating mb-5">
                                                                <ul class="rating-d">
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                </ul>
                                                                <span>(01 review)</span>
                                                            </div>
                                                            <div class="features-des">
                                                                <ul>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="product-stock mb-15">
                                                <h5>Availability: <span> 940 in stock</span></h5>
                                                <h6>$125.00</h6>
                                            </div>
                                            <div class="stock-btn ">
                                                <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                Add to Cart
                                                </button>
                                                <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                    Quick View
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-item-pd">
                                    <div class="row align-items-center">
                                        <div class="col-xl-9">
                                            <div class="single-features-item single-features-item-df b-radius mb-20">
                                                <div class="row  g-0 align-items-center">
                                                    <div class="col-md-4">
                                                        <div class="features-thum">
                                                            <div class="features-product-image w-img">
                                                                <a href="product-details.html"><img src="assets/img/product/sm-6.jpg" alt=""></a>
                                                            </div>
                                                            <div class="product-action">
                                                                <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-layer-group"></i>
                                                                    <i class="fal fa-layer-group"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product__content product__content-d">
                                                            <h6><a href="product-details.html">Korea Stainless Steel Pot Set 5 Piecs</a></h6>
                                                            <div class="rating mb-5">
                                                                <ul class="rating-d">
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                </ul>
                                                                <span>(01 review)</span>
                                                            </div>
                                                            <div class="features-des">
                                                                <ul>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="product-stock mb-15">
                                                <h5>Availability: <span> 940 in stock</span></h5>
                                                <h6>$99</h6>
                                            </div>
                                            <div class="stock-btn ">
                                                <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                Add to Cart
                                                </button>
                                                <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                    Quick View
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-item-pd">
                                    <div class="row align-items-center">
                                        <div class="col-xl-9">
                                            <div class="single-features-item single-features-item-df b-radius mb-20">
                                                <div class="row  g-0 align-items-center">
                                                    <div class="col-md-4">
                                                        <div class="features-thum">
                                                            <div class="features-product-image w-img">
                                                                <a href="product-details.html"><img src="assets/img/product/sm-7.jpg" alt=""></a>
                                                            </div>
                                                            <div class="product-action">
                                                                <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-layer-group"></i>
                                                                    <i class="fal fa-layer-group"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product__content product__content-d">
                                                            <h6><a href="product-details.html">HP Stainless Steel Hot Water Bottle</a></h6>
                                                            <div class="rating mb-5">
                                                                <ul class="rating-d">
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                </ul>
                                                                <span>(01 review)</span>
                                                            </div>
                                                            <div class="features-des">
                                                                <ul>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="product-stock mb-15">
                                                <h5>Availability: <span> 940 in stock</span></h5>
                                                <h6>$125.00</h6>
                                            </div>
                                            <div class="stock-btn ">
                                                <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                Add to Cart
                                                </button>
                                                <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                    Quick View
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-item-pd">
                                    <div class="row align-items-center">
                                        <div class="col-xl-9">
                                            <div class="single-features-item single-features-item-df b-radius mb-20">
                                                <div class="row  g-0 align-items-center">
                                                    <div class="col-md-4">
                                                        <div class="features-thum">
                                                            <div class="features-product-image w-img">
                                                                <a href="product-details.html"><img src="assets/img/product/sm-8.jpg" alt=""></a>
                                                            </div>
                                                            <div class="product-action">
                                                                <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                                    <i class="fal fa-eye"></i>
                                                                    <i class="fal fa-eye"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-heart"></i>
                                                                    <i class="fal fa-heart"></i>
                                                                </a>
                                                                <a href="#" class="icon-box icon-box-1">
                                                                    <i class="fal fa-layer-group"></i>
                                                                    <i class="fal fa-layer-group"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="product__content product__content-d">
                                                            <h6><a href="product-details.html">The North Face Womens Resolve 2 Jack</a></h6>
                                                            <div class="rating mb-5">
                                                                <ul class="rating-d">
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                </ul>
                                                                <span>(01 review)</span>
                                                            </div>
                                                            <div class="features-des">
                                                                <ul>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="product-stock mb-15">
                                                <h5>Availability: <span> 940 in stock</span></h5>
                                                <h6>$140.00</h6>
                                            </div>
                                            <div class="stock-btn ">
                                                <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                Add to Cart
                                                </button>
                                                <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                    Quick View
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <!-- Paginate  -->
    
                </div>
            </div>
    </div>
</div>