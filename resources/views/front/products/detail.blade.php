@extends('front.layout.layout')
@section('content')

    <style>
        /*  
 *  Pure CSS star rating that works without reversing order
 *  of inputs
 *  -------------------------------------------------------
 *  NOTE: For the styling to work, there needs to be a radio
 *        input selected by default. There also needs to be a
 *        radio input before the first star, regardless of
 *        whether you offer a 'no rating' or 0 stars option
 *  
 *  This codepen uses FontAwesome icons
 */

#full-stars-example {

  /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
  .rating-group {
    display: inline-flex;
  }
  
  /* make hover effect work properly in IE */
  .rating__icon {
    pointer-events: none;
  }
  
  /* hide radio inputs */
  .rating__input {
   position: absolute !important;
   left: -9999px !important;
  }

  /* set icon padding and size */
  .rating__label {
    cursor: pointer;
    padding: 0 0.1em;
    font-size: 2rem;
  }
  
  /* set default star color */
  .rating__icon--star {
    color: orange;
  }
  
  /* set color of none icon when unchecked */
  .rating__icon--none {
    color: #eee;
  }

  /* if none icon is checked, make it red */
  .rating__input--none:checked + .rating__label .rating__icon--none {
    color: red;
  }

  /* if any input is checked, make its following siblings grey */
  .rating__input:checked ~ .rating__label .rating__icon--star {
    color: #ddd;
  }

  /* make all stars orange on rating group hover */
  .rating-group:hover .rating__label .rating__icon--star {
    color: orange;
  }

  /* make hovered input's following siblings grey on hover */
  .rating__input:hover ~ .rating__label .rating__icon--star {
    color: #ddd;
  }
  
  /* make none icon grey on rating group hover */
  .rating-group:hover .rating__input--none:not(:hover) + .rating__label .rating__icon--none {
     color: #eee;
  }

  /* make none icon red on hover */
  .rating__input--none:hover + .rating__label .rating__icon--none {
    color: red;
  }
}

#half-stars-example {

  /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
  .rating-group {
    display: inline-flex;
  }
  
  /* make hover effect work properly in IE */
  .rating__icon {
    pointer-events: none;
  }
  
  /* hide radio inputs */
  .rating__input {
   position: absolute !important;
   left: -9999px !important;
  }

  /* set icon padding and size */
  .rating__label {
    cursor: pointer;
    /* if you change the left/right padding, update the margin-right property of .rating__label--half as well. */
    padding: 0 0.1em;
    font-size: 2rem;
  }

  /* add padding and positioning to half star labels */
  .rating__label--half {
    padding-right: 0;
    margin-right: -0.6em;
    z-index: 2;
  }
  
  /* set default star color */
  .rating__icon--star {
    color: orange;
  }
  
  /* set color of none icon when unchecked */
  .rating__icon--none {
    color: #eee;
  }

  /* if none icon is checked, make it red */
  .rating__input--none:checked + .rating__label .rating__icon--none {
    color: red;
  }

  /* if any input is checked, make its following siblings grey */
  .rating__input:checked ~ .rating__label .rating__icon--star {
    color: #ddd;
  }
  
  /* make all stars orange on rating group hover */
  .rating-group:hover .rating__label .rating__icon--star,
  .rating-group:hover .rating__label--half .rating__icon--star {
    color: orange;
  }

  /* make hovered input's following siblings grey on hover */
  .rating__input:hover ~ .rating__label .rating__icon--star,
  .rating__input:hover ~ .rating__label--half .rating__icon--star {
    color: #ddd;
  }
  
  /* make none icon grey on rating group hover */
  .rating-group:hover .rating__input--none:not(:hover) + .rating__label .rating__icon--none {
     color: #eee;
  }

  /* make none icon red on hover */
  .rating__input--none:hover + .rating__label .rating__icon--none {
    color: red;
  }
}

#full-stars-example-two {

  /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
  .rating-group {
    display: inline-flex;
  }
  
  /* make hover effect work properly in IE */
  .rating__icon {
    pointer-events: none;
  }
  
  /* hide radio inputs */
  .rating__input {
   position: absolute !important;
   left: -9999px !important;
  }
  
  /* hide 'none' input from screenreaders */
  .rating__input--none {
    display: none
  }

  /* set icon padding and size */
  .rating__label {
    cursor: pointer;
    padding: 0 0.1em;
    font-size: 2rem;
  }
  
  /* set default star color */
  .rating__icon--star {
    color: orange;
  }

  /* if any input is checked, make its following siblings grey */
  .rating__input:checked ~ .rating__label .rating__icon--star {
    color: #ddd;
  }
  
  /* make all stars orange on rating group hover */
  .rating-group:hover .rating__label .rating__icon--star {
    color: orange;
  }

  /* make hovered input's following siblings grey on hover */
  .rating__input:hover ~ .rating__label .rating__icon--star {
    color: #ddd;
  }
}

    </style>

    <main>
        <!-- breadcrumb__area-start -->
        <section class="breadcrumb__area box-plr-75">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                  
                                    <?php echo $categoryDetails['breadcrumbs']; ?>
                                </ol>
                              </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb__area-end -->
         
            
        <!-- product-details-start -->
        <div class="product-details">
            <form name="addToCart" id="addToCart" action="javascript:;">
                
                <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
            <div class="container">
                <div class="row">
                    
                    <div class="col-xl-6">
                        
                        <div class="product__details-nav d-sm-flex align-items-start">
                            
                             <ul class="nav nav-tabs flex-sm-column justify-content-between" id="productThumbTab" role="tablist">
                                @foreach ($productDetails['images'] as $index => $image)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if($index == 0) active @endif " id="thumb{{ $index }}-tab" type="button" role="tab">
                                        <img style="height: 100px; width:70px;" src="{{ asset('front/images/products/small/'.$image['image']) }}" alt="" data-large-img="{{ asset('front/images/products/large/'.$image['image']) }}">
                                    </button>
                                </li>
                                @endforeach
                            </ul>
                            
                            <div class="product__details-thumb">
                                <div class="tab-content" id="productThumbContent">
                               
                                    <div class="product__details-thumb">
                                <div class="product__details-nav-thumb w-img zoom-container">
                                    <!-- Main image display -->
                                    <img id="mainImage" src="{{ asset('front/images/products/large/'.$productDetails['images'][0]['image']) }}" alt="">
                                </div>
                            </div>
                                     
                                  </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .zoom-container {
                            position: relative;
                            overflow: hidden;
                        }

                        .zoom-container img {
                            width: 100%;
                            transition: transform 0.3s ease;
                        }

                        .zoom-container:hover img {
                            transform: scale(1.5);
                        }
                    </style>
                    
                    <div class="col-xl-6">
                        <div class="print-error-msg ">
                </div>
                <div class="print-success-msg ">
                    @if(Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Eroor:</strong> {{ Session::get('error_message') }}
                            <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>-->
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
                </div>
                        <div class="product__details-content">
                            <h6>{{ $productDetails['product_name'] }}</h6>
                            
                                @if ($avgStarRating>0)
                                    <?php 
                                       $star = 1;
                                       while($star<=$avgStarRating){
                                    ?>
                                    <span style="color:gold; font-size: 30px;">&#9733;</span>
                                    <?php $star++; } ?>
                                @endif
                                <span>({{ $avgRating}} review)</span>
                                
                            <div class="price mb-10 getAttributePrice">
                                <span>£{{ $productDetails['final_price'] }}</span> &nbsp;&nbsp;
                                @if ($productDetails['discount_type']!="")
                                <span>£{{ $productDetails['product_price'] }}</span>
                                @endif
                            </div>
                            <div class="features-des mb-20 mt-10">
                                <ul>
                                    <li><a href="#"><i class="fas fa-circle"></i>{{ $productDetails['description'] }}.</a></li>
                                </ul>
                            </div>
                            <div class="product-stock mb-20">
                                <h5>Availability: <span> 940 in stock</span></h5>
                            </div>
                            <div class="cart-option mb-15">
                                <div class="product-quantity mr-20">
                                    <div class="cart-plus-minus p-relative"><input type="text" name="qty" value="1"><div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                                </div>
                                <button class="cart-btn" type="submit">
                                    Add To Cart
                                </button>
                                <!--<a href="#" class="cart-btn">Add to Cart</a>-->
                            </div>
                            <!-- Cable Configuration -->
                                <div class="cable-config">
                                <span>Cable configuration</span>
                                <div class="cable-choose">
                                    @foreach ($productDetails['attributes'] as $attribute)
                                    <input type="radio" id="{{$attribute['size']}}" name="size" value="{{$attribute['size']}}" product-id="{{$productDetails['id']}}" class="getPrice" required hidden>
                                    <label for="{{$attribute['size']}}">{{$attribute['size']}}</label>
                                    @endforeach
                                </div>
                                
                                <a href="#">How to configure your headphones</a>
                                </div>
                                   <!-- Product Color -->
                                    
                                <div class="product-color">
                                    <span>Choose Your Color</span>
                                    <div class="color-choose">
                                        @if (count($groupProducts) > 0)
                                            @foreach ($groupProducts as $product)
                                                <div>
                                                    <a href="{{ url('product/'.$product['id'])}}" class="color-option" style="background-color: {{ $product['product_color'] }};">
                                                        <span></span>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                
                                    <style>
                                        /* Cable Configuration */
                                            .cable-choose {
                                            margin-bottom: 20px;
                                            }

                                            .cable-choose input {
                                            display: none;
                                            }

                                            .cable-choose label {
                                            border: 2px solid #E1E8EE;
                                            border-radius: 6px;
                                            padding: 13px 20px;
                                            font-size: 14px;
                                            color: #5E6977;
                                            background-color: #fff;
                                            cursor: pointer;
                                            transition: all .5s;
                                            margin-right: 10px; /* Add spacing between labels */
                                            display: inline-block;
                                            }

                                            .cable-choose input:checked + label {
                                            border: 2px solid #86939E;
                                            color: #86939E;
                                            }

                                            .cable-choose label:hover,
                                            .cable-choose label:active,
                                            .cable-choose label:focus {
                                            border: 2px solid #86939E;
                                            outline: none;
                                            }

                                            .cable-config {
                                            border-bottom: 1px solid #E1E8EE;
                                            margin-bottom: 20px;
                                            }

                                            .cable-config a {
                                            color: #358ED7;
                                            text-decoration: none;
                                            font-size: 12px;
                                            position: relative;
                                            margin: 10px 0;
                                            display: inline-block;
                                            }

                                            .cable-config a:before {
                                            content: "?";
                                            height: 15px;
                                            width: 15px;
                                            border-radius: 50%;
                                            border: 2px solid rgba(53, 142, 215, 0.5);
                                            display: inline-block;
                                            text-align: center;
                                            line-height: 16px;
                                            opacity: 0.5;
                                            margin-right: 5px;
                                            }
                                                                                /* Product Color */
                                        .product-color {
    margin-bottom: 30px;
}

.color-choose div {
    display: inline-block;
}

.color-option {
    display: inline-block;
    width: 40px;
    height: 40px;
    margin: -1px 4px 0 0;
    vertical-align: middle;
    cursor: pointer;
    border-radius: 50%;
    border: 2px solid #FFFFFF;
    box-shadow: 0 1px 3px 0 rgba(0,0,0,0.33);
    position: relative;
}

.color-option span {
    display: none; /* Hide the span element but keep it for future use if needed */
}

.color-option.checked {
    background-image: url(images/check-icn.svg);
    background-repeat: no-repeat;
    background-position: center;
}

/* Example color styles */
.color-option.red {
    background-color: #C91524;
}

.color-option.blue {
    background-color: #314780;
}

.color-option.black {
    background-color: #323232;
}

                                    </style>
                            <div class="details-meta">
                                <div class="d-meta-left">
                                    <div class="dm-item mr-20">
                                        <a href="#"><i class="fal fa-heart"></i>Add to wishlist</a>
                                    </div>
                                    <div class="dm-item">
                                        <a href="#"><i class="fal fa-layer-group"></i>Compare</a>
                                    </div>
                                </div>
                                <div class="d-meta-left">
                                    <div class="dm-item">
                                        <a href="#"><i class="fal fa-share-alt"></i>Share</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tag-area mt-15">
                                <div class="product_info">
                                    <span class="sku_wrapper">
                                        <span class="title">SKU:</span>
                                        <span class="sku">DK1002</span>
                                    </span>
                                    <span class="posted_in">
                                        <span class="title">Categories:</span>
                                        <a href="#">iPhone</a>
                                        <a href="#">Tablets</a>
                                    </span>
                                    <span class="tagged_as">
                                        <span class="title">Tags:</span>
                                        <a href="#">Smartphone</a>, 
                                        <a href="#">Tablets</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            </form>
        </div>
        <!-- product-details-end -->

        <!-- product-details-des-start -->
        <div class="product-details-des mt-40 mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="product__details-des-tab">
                            <ul class="nav nav-tabs" id="productDesTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="des-tab" data-bs-toggle="tab" data-bs-target="#des" type="button" role="tab" aria-controls="des" aria-selected="true">Description </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="aditional-tab" data-bs-toggle="tab" data-bs-target="#aditional" type="button" role="tab" aria-controls="aditional" aria-selected="false">Additional information</button>
                                  </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Reviews ({{count($ratings) }}) </button>
                                </li>
                              </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="prodductDesTaContent">
                    <div class="tab-pane fade active show" id="des" role="tabpanel" aria-labelledby="des-tab">
                        <div class="product__details-des-wrapper">
                            <p class="des-text mb-35">{{ $productDetails['description'] }}</p>
                            @if ($productDetails['product_video'])
                            <video width="400" controls>
                            <source src="{{ url('front/videos/products/'.$productDetails['product_video']) }}" type="video/mp4">
                            Your browser does not support HTML video.
                            </video>
                            @else
                                Product Video Does Not Exists
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="aditional" role="tabpanel" aria-labelledby="aditional-tab">
                        <div class="product__desc-info">
                            <ul>
                               <li>
                                  <h6>Brand</h6>
                                  <span>{{ $productDetails['brand']['brand_name'] }}</span>
                               </li>
                               <li>
                                  <h6>Product Code</h6>
                                  <span>{{ $productDetails['product_code'] }}</span>
                               </li>
                               <li>
                                  <h6>Product Color</h6>
                                  <span>{{ $productDetails['product_color'] }}</span>
                               </li>
                               @if (!empty($productDetails['fabric']))
                               <li>
                                  <h6>Fabric</h6>
                                  <span>{{ $productDetails['fabric'] }}</span>
                               </li>
                               @endif
                               @if (!empty($productDetails['sleeve']))
                               <li>
                                  <h6>Sleeve</h6>
                                  <span>{{ $productDetails['sleeve'] }}</span>
                               </li>
                               @endif
                               @if (!empty($productDetails['fit']))
                               <li>
                                  <h6>Fit</h6>
                                  <span>{{ $productDetails['fit'] }}</span>
                               </li>
                               @endif
                               @if (!empty($productDetails['neck']))
                               <li>
                                  <h6>Neck</h6>
                                  <span>{{ $productDetails['neck'] }}</span>
                               </li>
                               @endif
                               @if (!empty($productDetails['occasion']))
                               <li>
                                  <h6>Occasion</h6>
                                  <span>{{ $productDetails['occasion'] }}</span>
                               </li>
                               @endif
                               @if (!empty($productDetails['product_weight']))
                               <li>
                                  <h6>Product Weight</h6>
                                  <span>{{ $productDetails['product_weight'] }}KG</span>
                               </li>
                               @endif
                               
                            </ul>
                         </div>
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <form action="{{ url('add-rating') }}" method="POST" name="formRating" id="formRating">@csrf
                            <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
                            <div class="product__details-review">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="review-rate">
                                            <h5>{{ $avgRating }}</h5><br>
                                            <div class="review-star">
                                                <div class="container">
                                                    <div id="full-stars-example-two">
                                                            <div class="rating-group">
                                                                <input disabled checked class="rating__input rating__input--none" name="rating" id="rating3-none" value="0" type="radio">
                                                                <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="rating" id="rating3-1" value="1" type="radio">
                                                                <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="rating" id="rating3-2" value="2" type="radio">
                                                                <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="rating" id="rating3-3" value="3" type="radio">
                                                                <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="rating" id="rating3-4" value="4" type="radio">
                                                                <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                                <input class="rating__input" name="rating" id="rating3-5" value="5" type="radio">
                                                            </div>
                                                    </div>
                                                    <!--<div id="full-stars-example">
                                                        <div class="rating-group">
                                                            <input class="rating__input rating__input--none" name="rating" id="rating-none" value="0" type="radio">
                                                            <label aria-label="No rating" class="rating__label" for="rating-none"><i class="rating__icon rating__icon--none fa fa-ban"></i></label>
                                                            <label aria-label="1 star" class="rating__label" for="rating-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                            <input class="rating__input" name="rating" id="rating-1" value="1" type="radio">
                                                            <label aria-label="2 stars" class="rating__label" for="rating-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                            <input class="rating__input" name="rating" id="rating-2" value="2" type="radio">
                                                            <label aria-label="3 stars" class="rating__label" for="rating-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                            <input class="rating__input" name="rating" id="rating-3" value="3" type="radio" checked>
                                                            <label aria-label="4 stars" class="rating__label" for="rating-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                            <input class="rating__input" name="rating" id="rating-4" value="4" type="radio">
                                                            <label aria-label="5 stars" class="rating__label" for="rating-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                                            <input class="rating__input" name="rating" id="rating-5" value="5" type="radio">
                                                        </div>
                                                    </div>-->
                                                </div>
                                                <!--<a href="#"><i class="fas fa-star"></i></a>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                                <a href="#"><i class="fas fa-star"></i></a>
                                                <a href="#"><i class="fas fa-star"></i></a>-->
                                            </div><br>
                                            <span class="review-count">01 Review</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-8">
                                        <div class="review-des-infod">
                                            <!--<h6>1 review for "<span>Wireless Bluetooth Over-Ear Headphones</span>"</h6>-->
                                            <div class="review-details-des">
                                                <div class="author-image mr-15">
                                                    <!--<a href="#"><img src="assets/img/author/author-sm-1.jpeg" alt=""></a>-->
                                                </div>
                                                <div class="review-details-content">
                                                    @if (count($ratings)>0)
                                                      @foreach ($ratings as $rating)
                                                    <div class="str-info">
                                                        <?php
                                                            $count=0;
                                                            while ($count<$rating['rating']) {
                                                            
                                                        ?>
                                                        <span style="color: gold; font-size: 30px; ">&#9733;</span>
                                                        <?php $count++; } ?>
                                                        <!--<div class="review-star mr-15">
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                        </div>-->
                                                        <div class="add-review-option">
                                                            <!--<a href="#">Add Review</a>-->
                                                        </div>
                                                    </div>
                                                    <div class="name-date mb-30">
                                                        
                                                        <h6> {{ $rating['user']['name'] }} – <span> {{ date("d-m-Y H:i:s",strtotime($rating['created_at'])) }}</span></h6>
                                                        
                                                    </div>
                                                    <p>{{ $rating['review'] }}.</p>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="product__details-comment ">
                                            <div class="comment-title mb-20">
                                            <h3>Add a review</h3>
                                            <!--<p>Your email address will not be published. Required fields are marked *</p>-->
                                            </div>
                                            <div class="comment-rating mb-20">
                                            <span>Overall ratings ({{count($ratings) }})</span>
                                            <ul>
                                                <?php /*<?php
                                                    $count=0;
                                                    while ($count<$rating['ratings']) {
                                                ?>
                                                <span style="color: gold; font-size: 30px; ">&#9733;</span>
                                                <?php $count++; } ?>*/?>

                                                <?php /*@if (count($ratings) > 0)
                                                    @foreach ($ratings as $rating)
                                                        <div class="str-info">
                                                            @for ($i = 0; $i < $rating['rating']; $i++)
                                                                <span style="color: gold; font-size: 30px; float:right;">&#9733;</span>
                                                            @endfor
                                                        </div>
                                                    @endforeach
                                                @endif*/?>

                                            </ul>
                                            </div>
                                            <div class="comment-input-box">
                                            <!--<form action="#">-->
                                                <div class="row">
                                                    <!--<div class="col-xxl-6 col-xl-6">
                                                        <div class="comment-input">
                                                        <input type="text" placeholder="Your Name">
                                                        </div>
                                                    </div>-->
                                                    <!--<div class="col-xxl-6 col-xl-6">
                                                        <div class="comment-input">
                                                        <input type="email" placeholder="Your Email">
                                                        </div>
                                                    </div>-->
                                                    <div class="col-xxl-12">
                                                        <textarea name="review" placeholder="Your review" class="comment-input comment-textarea" required=""></textarea>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="comment-agree d-flex align-items-center mb-25">
                                                        <div class="form-check">
                                                            <!--<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">-->
                                                            <!--<label class="form-check-label" for="flexCheckDefault">
                                                            Save my name, email, and website in this browser for the next time I comment.
                                                            </label>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="comment-submit">
                                                        <button type="submit" class="cart-btn">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!--</form>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><br><br>
        <!-- trending-product-area-start 1 -->
        <section class="trending-product-area light-bg-s pt-25 pb-15">
            
            <div class="container custom-conatiner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-30">
                            <div class="section__title section__title-2">
                                <h5 class="st-titile">RELATED PRODUCTS</h5>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    @foreach ($relatedProducts as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2"> 
                         
                        <div class="product__item product__item-2 b-radius-2 mb-20">
                            
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
                                <div class="product__offer">
                                <span class="discount">-15%</span>
                                </div>
                                <div class="product-action product-action-2">
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
                            <div class="product__content product__content-2">
                                <h6><a href="product-details.html">{{ $product['brand']['brand_name'] }}</a></h6>
                                <h6><a href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a></h6>
                                <div class="rating mb-5 mt-10">
                                    <ul>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    </ul>
                                    <span>(01 review)</span>
                                </div>
                                <div class="price">
                                    <span>{{ $product['final_price'] }}£-
                                        @if ($product['discount_type']!="")
                                        <span style="text-decoration:line-through;color:red;">{{ $product['product_price'] }}£</span>
                                    </span>
                                    @endif
                                    </span>
                                </div>
                            </div>
                            <div class="product__add-cart text-center">
                                <button type="button" class="cart-btn-3 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                Add to Cart
                                </button>
                            </div>
                            
                        </div>
                        
                    </div>
                    @endforeach
                </div>
                
            </div>
            
        </section>
        <!-- trending-product-area-end 1 -->

        <!-- trending-product-area-start -->
        <section class="trending-product-area light-bg-s pt-25 pb-15">
            <div class="container custom-conatiner">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-30">
                            <div class="section__title section__title-2">
                                <h5 class="st-titile">WHAT CUSTOMERS ALSO VIEWED</h5>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($recentlyViewedProducts as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2"> 
                         
                        <div class="product__item product__item-2 b-radius-2 mb-20">
                            
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
                                <div class="product__offer">
                                <span class="discount">-15%</span>
                                </div>
                                <div class="product-action product-action-2">
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
                            <div class="product__content product__content-2">
                                <h6><a href="product-details.html">{{ $product['brand']['brand_name'] }}</a></h6>
                                <h6><a href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a></h6>
                                <div class="rating mb-5 mt-10">
                                    <ul>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    </ul>
                                    <span>(01 review)</span>
                                </div>
                                <div class="price">
                                    <span>{{ $product['final_price'] }}£-
                                        @if ($product['discount_type']!="")
                                        <span style="text-decoration:line-through;color:red;">{{ $product['product_price'] }}£</span>
                                    </span>
                                    @endif
                                    </span>
                                </div>
                            </div>
                            <div class="product__add-cart text-center">
                                <button type="button" class="cart-btn-3 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                Add to Cart
                                </button>
                            </div>
                            
                        </div>
                        
                    </div>
                    @endforeach
                </div>
            </form>
            </div>
        </section>
        <!-- trending-product-area-end -->

        </div>
        <!-- product-details-des-end -->

        <!-- shop modal start -->
        <div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered product__modal" role="document">
                <div class="modal-content">
                    <div class="product__modal-wrapper p-relative">
                        <div class="product__modal-close p-absolute">
                            <button data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                        </div>
                        <div class="product__modal-inner">
                            <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product__modal-box">
                                    <div class="tab-content" id="modalTabContent">
                                        <div class="tab-pane fade show active" id="nav1" role="tabpanel" aria-labelledby="nav1-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="assets/img/quick-view/quick-view-1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav2" role="tabpanel" aria-labelledby="nav2-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="assets/img/quick-view/quick-view-2.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav3" role="tabpanel" aria-labelledby="nav3-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="assets/img/quick-view/quick-view-3.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav4" role="tabpanel" aria-labelledby="nav4-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="assets/img/quick-view/quick-view-4.jpg" alt="">
                                            </div>
                                        </div>
                                        </div>
                                    <ul class="nav nav-tabs" id="modalTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="nav1-tab" data-bs-toggle="tab" data-bs-target="#nav1" type="button" role="tab" aria-controls="nav1" aria-selected="true">
                                                <img src="assets/img/quick-view/quick-nav-1.jpg" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav2-tab" data-bs-toggle="tab" data-bs-target="#nav2" type="button" role="tab" aria-controls="nav2" aria-selected="false">
                                            <img src="assets/img/quick-view/quick-nav-2.jpg" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav3-tab" data-bs-toggle="tab" data-bs-target="#nav3" type="button" role="tab" aria-controls="nav3" aria-selected="false">
                                            <img src="assets/img/quick-view/quick-nav-3.jpg" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav4-tab" data-bs-toggle="tab" data-bs-target="#nav4" type="button" role="tab" aria-controls="nav4" aria-selected="false">
                                            <img src="assets/img/quick-view/quick-nav-4.jpg" alt="">
                                            </button>
                                        </li>
                                        </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product__modal-content">
                                    <h4><a href="product-details.html">Samsung C49J89: £875, Debenhams Plus</a></h4>
                                    <div class="product__review d-sm-flex">
                                        <div class="rating rating__shop mb-10 mr-30">
                                        <ul>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        </ul>
                                        </div>
                                        <div class="product__add-review mb-15">
                                        <span>01 review</span>
                                        </div>
                                    </div>
                                    <div class="product__price">
                                        <span>$109.00 – $307.00</span>
                                    </div>
                                    <div class="product__modal-des mt-20 mb-15">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Memory, Storage & SIM: 12GB RAM, 256GB.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                        </ul>
                                    </div>
                                    <div class="product__stock mb-20">
                                        <span class="mr-10">Availability :</span>
                                        <span>1795 in stock</span>
                                    </div>
                                    <div class="product__modal-form">
                                        <form action="#">
                                        <div class="pro-quan-area d-lg-flex align-items-center">
                                            <div class="product-quantity mr-20 mb-25">
                                                <div class="cart-plus-minus p-relative"><input type="text" value="1" /></div>
                                            </div>
                                            <div class="pro-cart-btn mb-25">
                                                <button class="cart-btn" type="submit">Add to cart</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="product__stock mb-30">
                                        <ul>
                                            <li><a href="#">
                                                <span class="sku mr-10">SKUS:</span>
                                                <span>Samsung C49J89: £875, Debenhams Plus</span></a>
                                            </li>
                                            <li><a href="#">
                                                <span class="cat mr-10">Categories:</span>
                                                <span>iPhone, Tablets</span></a>
                                            </li>
                                            <li><a href="#">
                                                <span class="tag mr-10">Tags:</span>
                                                <span>Smartphone, Tablets</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop modal end -->
         <script>
            document.addEventListener('DOMContentLoaded', function () {
            const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('#productThumbTab button img');

            thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function () {
            const largeImageSrc = thumbnail.getAttribute('data-large-img');
            mainImage.setAttribute('src', largeImageSrc);

            // Remove 'active' class from all buttons
            document.querySelectorAll('#productThumbTab button').forEach(button => {
                button.classList.remove('active');
            });

            // Add 'active' class to the clicked button
            this.parentElement.classList.add('active');
        });
    });
});

        </script>

    </main>
@endsection