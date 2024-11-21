<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function orders(){
        $orders = Order::with('orders_products')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        // dd($orders);
        return view('front.orders.orders')->with(compact('orders'));
    }

    public function orderDetails($id){
        $orderDetails = Order::with('orders_products','user','log')->where('id', $id)->first()->toArray();
        // dd($orderDetails);
        return view('front.orders.order_details')->with(compact('orderDetails'));
    }
}
