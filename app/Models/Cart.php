<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id')->with('brand','images');
    }
    /*public static function getCartItems(){
        $user_id = Auth::user()->id;
        $getCartItems = Cart::with(['product'=>function($query){
            $query->with('id','category_id','product_name','product_code','product_color','product_image','product_weight');
        }])->where('user_id', $user_id)->get()->toArray();
    }*/
    
}
