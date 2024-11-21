<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class IndexController extends Controller
{
    public function index(){
        // Get Home Page Slider Banners
        $homeSliderBanners = Banner::where('type', 'Slider')->where('status', 1)->orderBy('sort', 'ASC')->get()->toArray();

        // Get Home Page Fix Banners
        $homeFixBanners = Banner::where('type', 'Fix')->where('status', 1)->inRandomOrder()->orderBy('sort', 'ASC')->limit(3)->get()->toArray();

        // Geting New Arrival Product
        $newProducts = Product::with(['brand','images'])->where('status', 1)->orderBy('id', 'Desc')->limit(6)->get()->toArray();

        // Geting Best Seller Product
        $bestSellers = Product::with(['brand', 'images'])->where(['is_bestseller' => 'Yes', 'status' => 1])->inRandomOrder()->limit(6)->get()->toArray();

        // Get Discounted Products
        $discountedProducts = Product::with(['brand', 'images'])->where('product_discount', '>', 0)->where('status', 1)->inRandomOrder()->limit(6)->get()->toArray();

        // Get Features Products
        $featuredProducts = Product::with(['brand', 'images'])->where(['is_featured' => 'Yes', 'status' => 1])->inRandomOrder()->limit(6)->get()->toArray();

        // Get HomePage Image Category
        $homePageImageCategories = Category::where('status', 1)->inRandomOrder()->limit(4)->get()->toArray();
        //dd($homePageImageCategories);

        // Get HomePage Image Brands
        $homePageImageBrands = Brand::where('status', 1)->get()->toArray();
        //dd($homePageImageBrands);

        // dd($newProducts);
        return view('front.index')->with(compact('homeSliderBanners','homeFixBanners','newProducts','bestSellers','discountedProducts','featuredProducts','homePageImageCategories','homePageImageBrands'));
    }
}
