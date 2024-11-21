<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    use HasFactory;

    /*public static function getShippingCharges($total_weight, $country){
    // Retrieve shipping rates for the given country
    $getShippingCharges = ShippingCharge::where('country', $country)->first();
    
    if (!$getShippingCharges) {
        return 0; // Return 0 if no rates are found for the country
    }

    // Use the rates in $getShippingCharges for weight-based calculation
    if ($total_weight > 0) {
        if ($total_weight <= 500) {
            $rate = $getShippingCharges->{"0_500g"};
        } elseif ($total_weight > 500 && $total_weight <= 1000) {
            $rate = $getShippingCharges->{"501_1000g"};
        } elseif ($total_weight > 1000 && $total_weight <= 1500) {
            $rate = $getShippingCharges->{"1001_1500g"};
        } elseif ($total_weight > 1500 && $total_weight <= 2000) {
            $rate = $getShippingCharges->{"1501_2000g"};
        } elseif ($total_weight > 2000 && $total_weight <= 2500) {
            $rate = $getShippingCharges->{"2001_2500g"};
        } elseif ($total_weight > 2500 && $total_weight <= 3000) {
            $rate = $getShippingCharges->{"2501_3000g"};
        } elseif ($total_weight > 3000 && $total_weight <= 3500) {
            $rate = $getShippingCharges->{"3001_3500g"};
        } elseif ($total_weight > 3500 && $total_weight <= 4000) {
            $rate = $getShippingCharges->{"3501_4000g"};
        } elseif ($total_weight > 4000 && $total_weight <= 4500) {
            $rate = $getShippingCharges->{"4001_4500g"};
        } elseif ($total_weight > 4500 && $total_weight <= 5000) {
            $rate = $getShippingCharges->{"4501_5000g"};
        } else {
            $rate = $getShippingCharges->{"Above_5000g"};
        }
    } else {
        $rate = 0;
    }

    return $rate;
    }*/

    public static function getShippingCharges($total_weight,$country){
        $getShippingCharges = ShippingCharge::where('country', $country)->first();
        $shipping_charges = $getShippingCharges->rate;
        return $getShippingCharges->rate;
        if ($total_weight > 0) {
            if($total_weight>0 && $total_weight<=500){
                $rate = $shippingDetails['0_500g'];
            }else if($total_weight>501 && $total_weight<=1000){
                $rate = $shippingDetails['501_1000g'];
            }else if($total_weight>1001 && $total_weight<=1500){
                $rate = $shippingDetails['1001_1500g'];
            }else if($total_weight>1501 && $total_weight<=2000){
                $rate = $shippingDetails['1501_2000g'];
            }else if($total_weight>2001 && $total_weight<=2500){
                $rate = $shippingDetails['2001_2500g'];
            }else if($total_weight>2501 && $total_weight<=3000){
                $rate = $shippingDetails['2501_3000g'];
            }else if($total_weight>3001 && $total_weight<=3500){
                $rate = $shippingDetails['3001_3500g'];
            }else if($total_weight>3501 && $total_weight<=4000){
                $rate = $shippingDetails['3501_4000g'];
            }else if($total_weight>4001 && $total_weight<=4500){
                $rate = $shippingDetails['4001_4500g'];
            }else if($total_weight>4501 && $total_weight<=5000){
                $rate = $shippingDetails['4501_5000g'];
            }else if($total_weight>5000){
                $rate = $shippingDetails['Above_5000g'];
            }else{
                $rate = 0;
            }
        }else{
            $rate = 0;
        }
        return $rate;
    }
}
