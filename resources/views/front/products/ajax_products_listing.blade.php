@foreach ($categoryProducts as $product)
<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
    <div class="product__item product__item-d">
        <div class="product__thumb fix">
            <div class="product-image w-img">
                <a href="{{ url('product/'.$product['id'])}}">
                    @if (isset($product['images'][0]['image']) && !empty($product['images'][0]['image']))
                    <img src="{{ asset('front/images/products/small/'.$product['images'][0]['image']) }}" alt="product">
                    @else
                    <img src="{{ asset('front/img/product/tp-1.jpg') }}" alt="product">
                    @endif
                </a>
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
        <div class="product__content-3">
            <h6><a href="product-details.html">{{ $product['brand']['brand_name'] }}</a></h6><br>
            <h6><a href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a></h6>
            <div class="rating mb-5">
                <ul>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                </ul>
                <span>(01 review)</span>
            </div>
            <div class="price mb-10">
                <span style="color:green;">{{ $product['final_price'] }}£-
                @if ($product['discount_type']!="")
                    <span style="text-decoration:line-through;color:red;">{{ $product['product_price'] }}£</span>
                </span>
                @endif
            </div>
        </div>
        <div class="product__add-cart-s text-center">
            <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
            Add to Cart
            </button>
            <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId">
                Quick View
            </button>
        </div>
    </div>
</div>
@endforeach
@if(empty($_GET['query']))
    <div class="tp-pagination text-center pagination">
        <div class="row">
            <div class="col-xl-12">
                <div class="basic-pagination pt-30 pb-30">
                    <?php
                    if(!isset($_GET['color'])){
                        $_GET['color']="";
                    }
                    if(!isset($_GET['sort'])){
                        $_GET['sort']="";
                    }
                    if(!isset($_GET['size'])){
                        $_GET['size']="";
                    }
                        if(!isset($_GET['brand'])){
                        $_GET['brand']="";
                    }
                    if(!isset($_GET['price'])){
                        $_GET['price']="";
                    }
                    if(!isset($_GET['Fabric'])){
                        $_GET['Fabric']="";
                    }
                    if(!isset($_GET['fit'])){
                        $_GET['fit']="";
                    }
                    if(!isset($_GET['pattern'])){
                        $_GET['pattern']="";
                    }
                    if(!isset($_GET['sleeve'])){
                        $_GET['sleeve']="";
                    }
                    if(!isset($_GET['occasion'])){
                        $_GET['occasion']="";
                    }
                    ?>
                    @if (isset($request['sort']))
                    {{ $categoryProducts->appends(['sort'=>$_GET['sort'],'color'=>$_GET['color'],'size'=>$_GET['size'],'brand'=>$_GET['brand'],'price'=>$_GET['price'],'Fabric'=>$_GET['Fabric'],'fit'=>$_GET['fit'],'pattern'=>$_GET['pattern'],'sleeve'=>$_GET['sleeve'],'occasion'=>$_GET['occasion']])->links() }}
                    @else
                            {{ $categoryProducts->links() }}
                        @endif
                    <!--<nav>
                        <ul>
                            <li>
                                <a href="shop.html" class="active">1</a>
                            </li>
                            <li>
                                <a href="shop.html">2</a>
                            </li>
                            <li>
                                <a href="shop.html">3</a>
                            </li>
                            <li>
                            <a href="shop.html">5</a>
                            </li>
                            <li>
                            <a href="shop.html">6</a>
                            </li>
                            <li>
                                <a href="shop.html">
                                <i class="fal fa-angle-double-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>-->
                    
                </div>
            </div>
        </div>
    </div>
@endif
