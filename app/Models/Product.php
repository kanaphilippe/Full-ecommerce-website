<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsAttribute;
use App\Models\ProductsImage;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id')->with('parentcategory');
    } 

    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }

    public static function productsFilters(){
        // Product Filter
        $productsFilters['fabricArray'] = array('Cotton', 'Polyester', 'Wool');
        $productsFilters['sleeveArray'] = array('Full Sleeve', 'Half Sleeve', 'Short Sleeve', 'Sleeveless');
        $productsFilters['patternArray'] = array('Checked', 'Plain', 'Printed', 'Self', 'Solid');
        $productsFilters['fitArray'] = array('Regular', 'Slim');
        $productsFilters['occasionArray'] = array('Casual', 'Formal');
        return $productsFilters;
    }

    public function images(){
        return $this->hasMany('App\Models\ProductsImage');
    }

     public function attributes(){
        return $this->hasMany('App\Models\ProductsAttribute');
    }

    public static function getAttributePrice($product_id,$size){
        $attributePrice = ProductsAttribute::where(['product_id' => $product_id, 'size' => $size])->first()->toArray();
        // For Getting Product Discount
        $productDetails = Product::select(['product_discount', 'category_id', 'brand_id'])->where('id', $product_id)->first()->toArray();
        // For Getting Category Discount
        $categoryDetails = Category::select(['category_discount'])->where('id', $productDetails['category_id'])->first()->toArray();
        // For Getting Brand Discount
        $brandDetails = Brand::select(['brand_discount'])->where('id', $productDetails['brand_id'])->first()->toArray();

        
        if($productDetails['product_discount'] > 0){
            // 1st Case if there is any Product Discount
            $discount = $attributePrice['price']*$productDetails['product_discount']/100;
            $discount_percent = $productDetails['product_discount']; 
            $final_price = $attributePrice['price'] - $discount;
            
            }else if($categoryDetails['category_discount'] > 0){
            // 2nd Case if there is any Category Discount
            $discount = $attributePrice['price']*$categoryDetails['category_discount']/100;
            $discount_percent = $productDetails['category_discount'];
            $final_price = $attributePrice['price'] - $discount;
            
            }else if($brandDetails['brand_discount'] > 0){
            // 3rd Case if there is any Brand Discount
            $discount = $attributePrice['price']*$brandDetails['brand_discount']/100;
            $discount_percent = $productDetails['brand_discount'];
            $final_price = $attributePrice['price'] - $discount;
            }else{
                // 1st Case if there is no any Discount
                $discount = 0;
                $discount_percent = 0;
                $final_price = $attributePrice['price']; 
            }
        return array('product_price' => $attributePrice['price'],'final_price'=>$final_price,'discount'=>$discount,'discount_percent'=>$discount_percent);
    }

    public static function productStatus($product_id){
        $productStatus = Product::select('status')->where('id',$product_id)->first();
        return $productStatus->status;
    }

    public static function getProductDetails($product_id){
        $getProductDetails = Product::where('id', $product_id)->first()->toArray();
        return $getProductDetails;
    }

    public static function getAttributeDetails($product_id, $size){
        $getAttributeDetails = ProductsAttribute::where(['product_id' => $product_id, 'size' => $size])->first()->toArray();
        return $getAttributeDetails;
    }

    public static function getProductImage($product_id){
        $image = "";
        $productImageCount = ProductsImage::where('product_id', $product_id)->count();
        if ($productImageCount > 0) {
            $getProductImage = ProductsImage::select('image')->where('product_id',$product_id)->orderBy('image_sort','Desc')->first();
            $image = $getProductImage->image;
        }
        return $image;
    }
    
}
