<?php
use App\Models\Category;

// Get Categories and their Sub Catregories
$categories = Category::getCategories();
// echo "<pre>"; print_r($categories); die;
$totalCartItems = totalCartItems();
?>
<header class="header d-blue-bg">
<div class="header-top">
<div class="container custom-conatiner">
    <div class="header-inner">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-7">
                <div class="header-inner-start">
                    <div class="header__currency border-right">
                        <div class="s-name">
                            <span>Language: </span>
                        </div>
                        <select>
                            <option>English</option>
                            <option>Deutsch</option>
                            <option>Français</option>
                            <option>Espanol</option>
                        </select>
                    </div>
                    <div class="header__lang border-right">
                        <div class="s-name">
                            <span>Currency: </span>
                        </div>
                        <select>
                            <option> USD</option>
                            <option>EUR</option>
                            <option>INR</option>
                            <option>BDT</option>
                            <option>BGD</option>
                        </select>
                    </div>
                    <div class="support d-none d-sm-block">
                        <p>Need Help? <a href="tel:+001123456789">+001 123 456 789</a></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 d-none d-lg-block">
                <div class="header-inner-end text-md-end">
                    <div class="ovic-menu-wrapper ovic-menu-wrapper-2">
                        <ul>
                            <li>
                                <a href="about.html">About Us</a>
                            </li>
                            <li>
                                <a href="contact.html">Order Tracking</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact Us</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="header-mid">
<div class="container custom-conatiner">
    <div class="heade-mid-inner">
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                <div class="header__info">
                    <div class="logo">
                        <a href="index.html" class="logo-image"><img src="{{ asset('front/img/logo/logo1.svg') }}" alt="logo"></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                <div class="header__search">
                    <form action="{{ url('search-products') }}" method="get">
                        <div class="header__search-box">
                            <input class="search-input search-input-2" type="text" name="query" placeholder="I'm shopping for...">
                            <button class="button button-2" type="submit"><i class="far fa-search"></i></button>
                        </div>
                        <div class="header__search-cat">
                            <select>
                                <option selected="selected">All Categories</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['category_name']}}</option>
                                @endforeach
                                
                                
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-8 col-sm-8">
                <div class="header-action">
                    <div class="block-userlink">
                        <a class="icon-link icon-link-2" href="my-account.html">
                        <i class="flaticon-user"></i>
                        <span class="text">
                        <span class="sub">Login </span>
                        My Account </span>
                        </a>
                    </div>
                    <div class="block-wishlist action">
                        <a class="icon-link icon-link-2" href="wishlist.html">
                        <i class="flaticon-heart"></i>
                        <span class="count count-2">0</span>
                        <span class="text">
                        <span class="sub">Favorite</span>
                        My Wishlist </span>
                        </a>
                    </div>
                    <div class="block-cart action" >
                        <a class="icon-link icon-link-2"  href="#">
                        <i class="flaticon-shopping-bag " ></i>
                        <span class="count count-2 totalCartItems">{{$totalCartItems}}</span>
                        <span class="text " >
                        <span class="sub " >Your Cart:</span>
                        0.00
                </span>
                        </a>
                        <div class="cart " id="appendMiniCartItems">
                            @include('front.layout.header_cart_items')
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="header__bottom">
<div class="container custom-conatiner">
    <div class="row g-0 align-items-center">
        <div class="col-lg-3">                        
            <div class="cat__menu-wrapper side-border d-none d-lg-block">
                <div class="cat-toggle">
                    <button type="button" class="cat-toggle-btn cat-toggle-btn-1"><i class="fal fa-bars"></i> Shop by department</button>
                    <div class="cat__menu-2 cat__menu">
                        <nav id="mobile-menu" style="display: block;">
                            <ul>
                                <li>
                                    
                                    <a href="product.html">All Categories <i class="far fa-angle-down"></i></a>
                                    
                                    <ul class="mega-menu">
                                    @foreach ($categories as $category)
                                        <li><a href="{{ url($category['url']) }} ">{{ $category['category_name'] }}</a>
                                        @if (count($category['subcategories']))
                                        
                                        
                                            <ul class="mega-item">
                                                @foreach ($category['subcategories'] as $subcategory)
                                                <li><a  style="text-decoration: none; color:#fcbe00;" href="{{ url($subcategory['url'] ) }}">{{ $subcategory['category_name'] }}</a></li>
                                                 @if (count($subcategory['subcategories']))
                                                 
                                                 <ul >
                                                    @foreach ($subcategory['subcategories'] as $subsubcategory)
                                                    <li>
                                                        &nbsp;&nbsp;&nbsp;<a  href="{{ url($subsubcategory['url']) }}">{{ $subsubcategory['category_name']}}</a>
                                                    </li>
                                                    @endforeach
                                                 </ul>
                                                 @endif
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                         @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="product.html">Phone and Electronics <i class="far fa-angle-down"></i></a>
                                    <ul class="mega-menu mega-menu-2">
                                        <li><a href="product.html">Shop Pages</a>
                                            <ul class="mega-item">
                                                <li><a href="product-details.html">Standard SHop Page</a></li>
                                                <li><a href="product-details.html">Shop Right Sidebar</a></li>
                                                <li><a href="product-details.html">Shop Left Sidebar</a></li>
                                                <li><a href="product-details.html">Shop 3 Column</a></li>
                                                <li><a href="product-details.html">Shop 4 Column</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="product.html">Product Pages</a>
                                            <ul class="mega-item">
                                                <li><a href="product-details.html">Product Details</a></li>
                                                <li><a href="product-details.html">Product V2</a></li>
                                                <li><a href="product-details.html">Product V3</a></li>
                                                <li><a href="product-details.html">Varriable Product</a></li>
                                                <li><a href="product-details.html">External Product</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="product.html">Other Pages</a>
                                            <ul class="mega-item">
                                                <li><a href="product-details.html">wishlist</a></li>
                                                <li><a href="product-details.html">Shopping Cart</a></li>
                                                <li><a href="product-details.html">Checkout</a></li>
                                                <li><a href="product-details.html">Login</a></li>
                                                <li><a href="product-details.html">Register</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="product.html">Phone &amp; Tablets</a>
                                            <ul class="mega-item">
                                                <li><a href="product-details.html">Catagory 1</a></li>
                                                <li><a href="product-details.html">Catagory 2</a></li>
                                                <li><a href="product-details.html">Catagory 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="product.html">Phone &amp; Tablets</a>
                                            <ul class="mega-item">
                                                <li><a href="product-details.html">Catagory 1</a></li>
                                                <li><a href="product-details.html">Catagory 2</a></li>
                                                <li><a href="product-details.html">Catagory 3</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="product.html">Best Seller Products
                                        <span class="cat-label">hot!</span>
                                        <i class="far fa-angle-down"></i>
                                    </a>
                                    <ul class="mega-menu">
                                        <li><a href="product.html">Shop Pages</a>
                                            <ul class="mega-item">
                                                <li><a href="product-details.html">Standard SHop Page</a></li>
                                                <li><a href="product-details.html">Shop Right Sidebar</a></li>
                                                <li><a href="product-details.html">Shop Left Sidebar</a></li>
                                                <li><a href="product-details.html">Shop 3 Column</a></li>
                                                <li><a href="product-details.html">Shop 4 Column</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="product.html">Product Pages</a>
                                            <ul class="mega-item">
                                                <li><a href="product-details.html">Product Details</a></li>
                                                <li><a href="product-details.html">Product V2</a></li>
                                                <li><a href="product-details.html">Product V3</a></li>
                                                <li><a href="product-details.html">Varriable Product</a></li>
                                                <li><a href="product-details.html">External Product</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="product.html">Other Pages</a>
                                            <ul class="mega-item">
                                                <li><a href="product-details.html">wishlist</a></li>
                                                <li><a href="product-details.html">Shopping Cart</a></li>
                                                <li><a href="product-details.html">Checkout</a></li>
                                                <li><a href="product-details.html">Login</a></li>
                                                <li><a href="product-details.html">Register</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="product.html">Phone &amp; Tablets</a>
                                            <ul class="mega-item">
                                                <li><a href="product-details.html">Catagory 1</a></li>
                                                <li><a href="product-details.html">Catagory 2</a></li>
                                                <li><a href="product-details.html">Catagory 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="product.html">Phone &amp; Tablets</a>
                                            <ul class="mega-item">
                                                <li><a href="product-details.html">Catagory 1</a></li>
                                                <li><a href="product-details.html">Catagory 2</a></li>
                                                <li><a href="product-details.html">Catagory 3</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="product.html">Top 10 Offers
                                        <span class="cat-label green">new!</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="product.html">New Arrivals <i class="far fa-angle-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="product.html">Home Appliances</a></li>
                                        <li><a href="product.html">Technology</a>
                                            <ul class="submenu">
                                                <li><a href="product.html">Storage Devices</a></li>
                                                <li><a href="product.html">Monitors</a></li>
                                                <li><a href="product.html">Laptops</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="product.html">Office Equipments</a></li>
                                    </ul>
                                </li>
                                <li><a href="product.html">TV &amp; Audio</a></li>
                                <li><a href="product.html">Electronics &amp; Digital</a></li>
                                <li class="d-laptop-none"><a href="product.html">Fashion &amp; Clothings</a></li>
                                <li class="d-laptop-none"><a href="product.html">Jewelry &amp; Watches</a></li>
                                <li><a href="product.html">Health &amp; Beauty</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-3">
            <div class="header__bottom-left d-flex d-xl-block align-items-center">
            <div class="side-menu d-lg-none mr-20">
                <button type="button" class="side-menu-btn offcanvas-toggle-btn"><i class="fas fa-bars"></i></button>
            </div>
            <div class="main-menu d-none d-lg-block">
                <nav>
                    <ul>
                        <li>
                            <a href="index.html" class="active">Home <i class="far fa-angle-down"></i></a>
                            <ul class="megamenu-1">
                                <li><a href="index.html">Home Pages</a>
                                    <ul class="mega-item">
                                        <li><a href="index.html">Home One</a></li>
                                        <li><a href="index-2.html" class="active">Home Two</a></li>
                                        <li><a href="index-3.html">Home Three</a></li>
                                        <li><a href="product-details.html">Shop 3 Column</a></li>
                                        <li><a href="product-details.html">Shop 4 Column</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">Product Pages</a>
                                    <ul class="mega-item">
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="product-details.html">Product V2</a></li>
                                        <li><a href="product-details.html">Product V3</a></li>
                                        <li><a href="product-details.html">Varriable Product</a></li>
                                        <li><a href="product-details.html">External Product</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">Other Pages</a>
                                    <ul class="mega-item">
                                        <li><a href="product-details.html">wishlist</a></li>
                                        <li><a href="product-details.html">Shopping Cart</a></li>
                                        <li><a href="product-details.html">Checkout</a></li>
                                        <li><a href="product-details.html">Login</a></li>
                                        <li><a href="product-details.html">Register</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">Phone &amp; Tablets</a>
                                    <ul class="mega-item">
                                        <li><a href="product-details.html">Catagory 1</a></li>
                                        <li><a href="product-details.html">Catagory 2</a></li>
                                        <li><a href="product-details.html">Catagory 3</a></li>
                                        <li><a href="product-details.html">Catagory 4</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">Phone &amp; Tablets</a>
                                    <ul class="mega-item">
                                        <li><a href="product-details.html">Catagory 1</a></li>
                                        <li><a href="product-details.html">Catagory 2</a></li>
                                        <li><a href="product-details.html">Catagory 3</a></li>
                                        <li><a href="product-details.html">Catagory 4</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="about.html">About Us</a></li>
                        <li class="has-mega"><a href="shop.html">Shop <i class="far fa-angle-down"></i></a>
                            <div class="mega-menu">
                                <div class="container container-mega">
                                    <ul>
                                        <li>
                                            <ul>
                                            <li class="title"><a href="shop.html">SHOP LAYOUT</a></li>
                                            <li><a href="shop.html">Pagination</a></li>
                                            <li><a href="shop.html">Ajax Load More</a></li>
                                            <li><a href="shop.html">Infinite Scroll</a></li>
                                            <li><a href="shop.html">Sidebar Right</a></li>
                                            <li><a href="shop.html">Sidebar Left</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                            <li class="title"><a href="shop.html">SHOP PAGES</a></li>
                                            <li><a href="shop.html">List View</a></li>
                                            <li><a href="shop.html">Small Products</a></li>
                                            <li><a href="shop.html">Large Products</a></li>
                                            <li><a href="shop.html">Shop — 3 Items</a></li>
                                            <li><a href="shop.html">Shop — 4 Items</a></li>
                                            <li><a href="shop.html">Shop — 5 Items</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                            <li class="title"><a href="shop.html">PRODUCT LAYOUT</a></li>
                                            <li><a href="shop.html">Description Sticky</a></li>
                                            <li><a href="shop.html">Product Carousel</a></li>
                                            <li><a href="shop.html">Gallery Modern</a></li>
                                            <li><a href="shop.html">Thumbnail Left</a></li>
                                            <li><a href="shop.html">Thumbnail Right</a></li>
                                            <li><a href="shop.html">Thumbnail Botttom</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                            <li class="title"><a href="shop.html">Basketball</a></li>
                                            <li><a href="shop.html">East Hampton Fleece</a></li>
                                            <li><a href="shop.html">Faxon Canvas Low</a></li>
                                            <li><a href="shop.html">Habitasse Dictumst</a></li>
                                            <li><a href="shop.html">Kaoreet Lobortis</a></li>
                                            <li><a href="shop.html">NikeCourt Zoom</a></li>
                                            <li><a href="shop.html">NikeCourts Air Zoom</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                            <li class="title"><a href="shop.html">Basketball</a></li>
                                            <li><a href="shop.html">East Hampton Fleece</a></li>
                                            <li><a href="shop.html">Faxon Canvas Low</a></li>
                                            <li><a href="shop.html">Habitasse Dictumst</a></li>
                                            <li><a href="shop.html">Kaoreet Lobortis</a></li>
                                            <li><a href="shop.html">NikeCourt Zoom</a></li>
                                            <li><a href="shop.html">NikeCourts Air Zoom</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega-image hover-effect" style="background-image: url(front/img/bg/menu-item.jpg);"> 
                                            <ul>
                                                <li><a href="shop.html">
                                                <h4>Top Cameras <br> Bestseller Products</h4>
                                                <h5>4K</h5>
                                                <h6>Sale Up To <span>60% Off</span></h6>
                                                </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="offer mt-40">
                                    <p><b>30% OFF</b> the shipping of your first order with the code: <b>DUKA-SALE30</b></p>
                                </div>
                            </div>
                        </li>
                        <li><a href="blog.html">Blog <i class="far fa-angle-down"></i></a>
                            <ul class="submenu">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="about.html">Pages <i class="far fa-angle-down"></i></a>
                            <ul class="submenu">
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="product-details.html">Product Details</a></li>
                                <li><a href="faq.html">FAQs pages</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="404.html">404 Error</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-9">
            <div class="shopeing-text text-sm-end">
                <p>Spend $120 more and get free shipping!</p>
            </div>
        </div>
    </div>
</div>
</div>
</header>