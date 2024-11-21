<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orders_products(){
        return $this->hasMany('App\Models\OrdersProduct','order_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function log(){
        return $this->hasMany('App\Models\OrdersLog','order_id')->orderBy('id','Desc');
    }
}
