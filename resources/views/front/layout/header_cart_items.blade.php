<?php
use App\Models\Product;
$getCartItems = getCartItems();
$totalCartItems = totalCartItems();
?>
<div class="cart__mini ">
    <ul>
        <li>
            <div class="cart__title totalCartItems">
            <h4>Your Cart</h4>
            <!--<span>(Item in Cart)</span>-->
            </div>
        </li>
        <li>
             @php
                $total_price = 0;
            @endphp
                @foreach ($getCartItems as $item)
            <div class="cart__item d-flex justify-content-between align-items-center">
                
                <?php 
                    $getAttributePrice = Product::getAttributePrice($item['product_id'],$item['product_size']);
                    // dd($getAttributePrice);
                ?>
            <div class="cart__inner d-flex">
                <div class="cart__thumb">
                <a href="{{ url('product/'.$item['product']['id'])}}">
                    @if (isset($item['product']['images'][0]['image']) && !empty($item['product']['images'][0]['image']))
                    <img src="{{ asset('front/images/products/small/'.$item['product']['images'][0]['image']) }}" alt="">
                    @else
                    <img src="{{ asset('front/img/product/tp-1.jpg') }}" alt="">
                    @endif
                </a>
                </div>
                <div class="cart__details">
                <h6><a href="{{ url('product/'.$item['product']['id'])}}">Name : {{ $item['product']['product_name'] }}</a></h6>
                @if(isset($item['product']['brand']['brand_name']))
                <h6><a href="#">Brand : {{ $item['product']['brand']['brand_name'] }}</a></h6>
                @else
                    No Brand
                @endif
                <div class="cart__price">
                    <span>{{ $item['product_qty'] }} x {{ $getAttributePrice['final_price'] }}</span>
                </div>
                </div>
            </div>
            <div class="cart__del">
                <a href="#"><i class="fal fa-trash deleteCartItem confirmDelete" data-cartid="{{$item['id'] }}"></i></a>
            </div>
            </div>
            @php
            $total_price = $total_price + ($getAttributePrice['final_price']*$item['product_qty']);
            @endphp
            @endforeach
        </li>
        <li>
            <div class="cart__sub d-flex justify-content-between align-items-center">
            <h6>Subtotal</h6>
            <span class="cart__sub-total">{{$total_price}}</span>
            </div>
        </li>
        <li>
            <a href="{{ url('cart') }}" class="wc-cart mb-10">View cart</a>
            <a href="{{url('checkout') }}" class="wc-checkout">Checkout</a>
        </li>
    </ul>
</div>