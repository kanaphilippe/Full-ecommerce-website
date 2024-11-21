<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function parentcategory(){
        return $this->hasOne('App\Models\Category','id','parent_id')->select('id','category_name','url')->where('status',1);
    }

    public function subcategories(){
        return $this->hasMany('App\Models\Category','parent_id')->where('status', 1);
    }

    public static function getCategories(){
        $getCategories = Category::with(['subcategories'=>function($query){
            $query->with('subcategories');
        }])->where('parent_id', 0)->where('status', 1)->get()->toArray();
        return $getCategories;
    }

    /*public static function categoryDetails($url){
        $categoryDetails = Category::select('id','parent_id', 'category_name', 'url')->with('subcategories')->where('url', $url)->first()->toArray();
        // echo "<pre>"; print_r($categoryDetails); die; 
        $catIds = array();
        $catIds[] = $categoryDetails['id'];
        foreach ($categoryDetails['subcategories'] as $subcat) {
            $catIds[] = $subcat['id'];
        }

        if($categoryDetails['parent_id']==0 || $categoryDetails['parent_id']==1 || $categoryDetails['parent_id']==2 || $categoryDetails['parent_id']==3){
            // Only Show Main Category In BreadCrumb
            //$breadcrumbs = '<a href="'.url($categoryDetails['url']).'">'.$categoryDetails['category_name'].'</a>';
            $breadcrumbs = '<li class="breadcrumb-item"><a href="'.url($categoryDetails['url']).'">'.$categoryDetails['category_name'].'</a></li>';
        }else{
            // Show Main Sub Category in BreadCrumb
            $parentCategory = Category::select('category_name', 'url')->where('id', $categoryDetails['parent_id'])->first()->toArray();
            $breadcrumbs = '<a href="'.url($parentCategory['url']).'">'.$parentCategory['category_name'].'</a>/<a href="'.url($categoryDetails['url']).'">'.$categoryDetails['category_name'].'</a>';
        }
        return array('catIds' => $catIds, 'categoryDetails' => $categoryDetails,'breadcrumbs'=>$breadcrumbs);
    }*/
    public static function categoryDetails($url) {
    $categoryDetails = Category::select('id', 'parent_id', 'category_name', 'url')
        ->with('subcategories')
        ->where('url', $url)
        ->first();

    // Check if categoryDetails is null
    if (!$categoryDetails) {
        return [
            'catIds' => [],
            'categoryDetails' => null,
            'breadcrumbs' => ''
        ];
    }

    // Convert to array if categoryDetails exists
    $categoryDetails = $categoryDetails->toArray();

    $catIds = [$categoryDetails['id']];
    foreach ($categoryDetails['subcategories'] as $subcat) {
        $catIds[] = $subcat['id'];
    }

    if (in_array($categoryDetails['parent_id'], [0, 1, 2, 3])) {
        // Only show main category in breadcrumb
        $breadcrumbs = '<li class="breadcrumb-item"><a href="' . url($categoryDetails['url']) . '">' . $categoryDetails['category_name'] . '</a></li>';
    } else {
        // Show main subcategory in breadcrumb
        $parentCategory = Category::select('category_name', 'url')
            ->where('id', $categoryDetails['parent_id'])
            ->first();

        // Check if parentCategory exists
        if ($parentCategory) {
            $parentCategory = $parentCategory->toArray();
            $breadcrumbs = '<a href="' . url($parentCategory['url']) . '">' . $parentCategory['category_name'] . '</a> / <a href="' . url($categoryDetails['url']) . '">' . $categoryDetails['category_name'] . '</a>';
        } else {
            $breadcrumbs = '<li class="breadcrumb-item"><a href="' . url($categoryDetails['url']) . '">' . $categoryDetails['category_name'] . '</a></li>';
        }
    }

    return [
        'catIds' => $catIds,
        'categoryDetails' => $categoryDetails,
        'breadcrumbs' => $breadcrumbs
    ];
}

}
 