<?php
use App\Models\Product;
?>
<div class="row">
    <div class="col-12">
        <form action="#">
            <div class="table-content table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">Images</th>
                            <th class="cart-product-name">Product</th>
                            <th class="product-price">Unit Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total_price = 0
                        @endphp
                        @foreach ($getCartItems as $item)
                        <?php 
                            $getAttributePrice = Product::getAttributePrice($item['product_id'],$item['product_size']);
                            // dd($getAttributePrice);
                        ?>
                        <tr>
                            <td class="product-thumbnail"><a href="{{ url('product/'.$item['product']['id'])}}">@if (isset($item['product']['images'][0]['image']) && !empty($item['product']['images'][0]['image']))
                            <img src="{{ asset('front/images/products/small/'.$item['product']['images'][0]['image']) }}" alt="product">
                            @else
                            <img src="{{ asset('front/img/product/tp-1.jpg') }}" alt="product">
                            @endif
                         </a>
                        </td>
                            <td class="product-name">Product Name : <a href="{{ url('product/'.$item['product']['id']) }}">{{ $item['product']['product_name'] }}</a><br>Size : <a href="{{ url('product/'.$item['product']['id'])}}">{{ $item['product_size'] }}</a><br>Color : <a href="{{ url('product/'.$item['product']['id'])}}">{{ $item['product']['product_color'] }}</a><br>Brand : <a href="{{ url('product/'.$item['product']['id'])}}">{{ $item['product']['brand']['brand_name'] }}</a></td>
                            <td class="product-price"><span class="amount">{{$item['product']['final_price'] }}</span></td>
                            <td class="product-quantity">
                                <div class="cart-plus-minus plus1 updateCartItem " data-cartid="{{ $item['id'] }}" data-qty="{{ $item['product_qty'] }}"><input type="text" value="{{$item['product_qty']}}"><div class="dec minus1 qtybutton qtyMinus">-</div><div class="inc qtybutton updateCartItem qtyPlus" data-cartid="{{ $item['id'] }}" data-qty="{{ $item['product_qty'] }}">+</div></div>
                        <!--<div class="cart-plus-minus ">
                                <div class="dec minus1 qtybutton updateCartItem qtyMinus" data-cartid="{{ $item['id'] }}" data-qty="{{ $item['product_qty'] }}">
                                    <i class="fa fa-minus "></i>
                                </div>
                                <input type="text" value="{{ $item['product_qty'] }}" readonly>
                                <div class="inc plus qtybutton updateCartItem qtyPlus" data-cartid="{{ $item['id'] }}" data-qty="{{ $item['product_qty'] }}">
                                    <i class="fa fa-plus "></i>
                                </div>
                        </div>-->

                                
                            </td>
                            <td class="product-subtotal">
                                <!--<span class="amount">{{$item['product']['final_price']*$item['product_qty'] }}</span>-->
                                <div class="price mb-10 getAttributePrice">
                    <span>£{{ $getAttributePrice['final_price']*$item['product_qty'] }}</span> &nbsp;&nbsp;
                    @if ($getAttributePrice['discount']>0)
                    <span style="color:#cd6d6d">({{ $getAttributePrice['discount_percent'] }}% OFF)</span>&nbsp;
                    <span style="color:red; text-decoration:line-through;">£{{ $getAttributePrice['product_price'] }}</span>
                    @endif
                </div>
                        </td>
                            <td class="product-remove deleteCartItem confirmDelete" data-cartid="{{$item['id'] }}" data-page="Checkout"><a href="#" ><i style="color:#fcbe00;" class="fa fa-trash " ></i></a>
                        </td>
                        </tr>
                        @php
                        $total_price = $total_price + ($getAttributePrice['final_price']*$item['product_qty']);
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <form action="javascript:void;">

                <div class="col-12">
                    
                    <div class="coupon-all">
                        
                        <div class="coupon">
                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                            <button id="applyCoupon" class="tp-btn-h1" type="submit" @if(Auth::check()) user="1" @endif>Apply
                                coupon</button>
                        </div>
                    
                        <div class="coupon2">
                            <button di="" class="tp-btn-h1" name="update_cart" type="submit">Update cart</button>
                        </div>
                    </div>
                    
                </div>
            </form>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-5">
                    <div class="cart-page-total">
                        <h2>Cart totals</h2>
                        <ul class="mb-20">
                            <li>Subtotal <span>{{$total_price}}</span></li>
                            <li>Coupon Discount<span class="couponAmount">
                                @if (Session::has('couponAmount'))
                                £{{Session::get('couponAmount')}}
                                @else
                                0£
                                @endif
                            </span></li>
                            <li>Grand Total <span class="grandTotal">
                                @php $grand_total = $total_price - Session::get('couponAmount') @endphp
                            <span>{{$grand_total}}</span>
                        </span>
                    </li>
                        </ul>
                        <a class="tp-btn-h1" href="{{ url('checkout') }}">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>