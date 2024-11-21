<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Laravel\Prompts\Prompt;

class ProductsFilters extends Model
{
    use HasFactory;

    public static function getColors($catIds){
        $getProductIds = Product::select('id')->whereIn('category_id', $catIds)->pluck('id');
        // dd($getProductIds);
        $getProductColors = Product::select('family_color')->whereIn('id', $getProductIds)->groupBy('family_color')->pluck('family_color');
        // dd($getProductColors);
        return $getProductColors;
    }

    public static function getSizes($catIds){
        $getProductIds = Product::select('id')->whereIn('category_id', $catIds)->pluck('id');
        $getProductSizes = ProductsAttribute::select('size')->where('status', 1)->whereIn('product_id', $getProductIds)->groupBy('size')->pluck('size');
        //dd($getProductSizes);
        return $getProductSizes;
    }

    public static function getBrands($catIds){
        $getProductIds = Product::select('id')->whereIn('category_id', $catIds)->pluck('id');
        $getProductBrandIds = Product::select('brand_id')->whereIn('id', $getProductIds)->groupBy('brand_id')->pluck('brand_id');
        $getProductBrands = Brand::select('id', 'brand_name')->where('status', 1)->whereIn('id', $getProductBrandIds)->orderBy('brand_name', 'ASC')->get()->toArray();
        // dd($getProductBrands);
        return $getProductBrands;
    }

    public static function getDynamicFilters($catIds){
        $getProductIds = Product::select('id')->whereIn('category_id', $catIds)->pluck('id');
        $getFilterColumns = ProductsFilters::select('filter_name')->pluck('filter_name')->toArray();
        if(count($getFilterColumns)>0){
            $getFilterValues = Product::select($getFilterColumns)->whereIn('id', $getProductIds)->where('status', 1)->get()->toArray();
        }else{
            $getFilterValues = Product::whereIn('id', $getProductIds)->where('status', 1)->get()->toArray(); 
        }
        $getFilterValues = array_filter(array_unique(Arr::flatten($getFilterValues)));
        // dd($getFilterValues);

        $getCategoryFilterColumns = ProductsFilters::select('filter_name')->whereIn('filter_value', $getFilterValues)->groupBy('filter_name')->orderBy('sort', 'Asc')->where('status', 1)->pluck('filter_name')->toArray();
        // dd($getCategoryFilterColumns);
        return $getCategoryFilterColumns;
    }

    public static function selectedFilters($filter_name,$catIds){
        $productFilters = Product::select($filter_name)->whereIn('category_id', $catIds)->groupBy($filter_name)->get()->toArray();
        // dd($productFilters);
        $productFilters = array_filter(Arr::flatten($productFilters));
        // dd($productFilters);
        return $productFilters; 
    }

    public static function filterTypes(){
        $filterTypes = ProductsFilters::select('filter_name')->groupBy('filter_name')->where('status', 1)->get()->toArray();
        $filterTypes = Arr::flatten($filterTypes);
        return $filterTypes;
    }
}
