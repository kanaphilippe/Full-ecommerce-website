<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderStatus;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    public function run(): void
    {
        $orderStatusRecords = [
            ['id'=>1,'name'=>'New','status'=>1],
            ['id'=>2,'name'=>'Pending','status'=>1],
            ['id'=>3,'name'=>'Cancelled','status'=>1],
            ['id'=>4,'name'=>'In Process','status'=>1],
            ['id'=>5,'name'=>'Shipped','status'=>1],
            ['id'=>6,'name'=>'Partially Shipped','status'=>1],
            ['id'=>7,'name'=>'Delivered','status'=>1],
            ['id'=>8,'name'=>'Partially Delivered','status'=>1],
            ['id'=>9,'name'=>'Payment Captured','status'=>1],
        ];

        OrderStatus::insert($orderStatusRecords); 
    }
}
