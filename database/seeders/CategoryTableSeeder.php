<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryRecords = [
            ['id'=>1,'parent_id'=>0,'category_name'=>'Clothing','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'clothing','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>2,'parent_id'=>0,'category_name'=>'Electronics','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'electronics','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>3,'parent_id'=>0,'category_name'=>'Appliances','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'appliances','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>4,'parent_id'=>1,'category_name'=>'Men','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'men','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>5,'parent_id'=>1,'category_name'=>'Women','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'women','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['id'=>6,'parent_id'=>1,'category_name'=>'Kids','category_image'=>'','category_discount'=>0,'description'=>'','url'=>'kids','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
        ];
        Category::insert($categoryRecords);
    }
}
