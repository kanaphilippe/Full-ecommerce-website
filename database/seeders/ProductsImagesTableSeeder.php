<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsImage;

class ProductsImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productImagesRecords = [
            ['id'=>1,'product_id'=>1,'image'=>'1.jpg','image_sort'=>1,'status'=>1],
            ['id'=>2,'product_id'=>1,'image'=>'2.jpg','image_sort'=>2,'status'=>1],
            ['id'=>3,'product_id'=>1,'image'=>'3.jpg','image_sort'=>3,'status'=>1],
        ];
        ProductsImage::insert($productImagesRecords);
    }
}
