<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsAttribute;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ProductAttributeRecords = [
            ['id'=>1,'product_id'=>1,'size'=>'Small','sku'=>'RT001S','price'=>1000,'stock'=>100,'status'=>1],
            ['id'=>2,'product_id'=>1,'size'=>'Medium','sku'=>'RT001M','price'=>11000,'stock'=>1100,'status'=>1],
            ['id'=>3,'product_id'=>1,'size'=>'Large','sku'=>'RT001L','price'=>12000,'stock'=>1200,'status'=>1],
        ];
        ProductsAttribute::Insert($ProductAttributeRecords);
    }
}
