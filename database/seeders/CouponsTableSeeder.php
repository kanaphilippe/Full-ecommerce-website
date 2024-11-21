<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couponRecords = [
            ['id'=>1,
            'coupon_option'=>'Manual',
            'coupon_code'=>'test10',
            'categories'=>'1,2,3,4,5,6,7,8,9',
            'brands'=>'2,3',
            'users'=>'',
            'coupon_type'=>'Single',
            'amount_type'=>'Percentage',
            'amount'=>'10',
            'expiry_date'=>'2024-10-30',
            'status'=>1
        ],
        ['id'=>2,
            'coupon_option'=>'Manual',
            'coupon_code'=>'test20',
            'categories'=>'1,2,3,4,5,6,7,8,9',
            'brands'=>'2,3',
            'users'=>'chephilippe65@gmail.com',
            'coupon_type'=>'Single',
            'amount_type'=>'Percentage',
            'amount'=>'20',
            'expiry_date'=>'2024-11-30',
            'status'=>1
    ],
    ['id'=>3,
    'coupon_option'=>'Automatic',
    'coupon_code'=>'ssfgz',
    'categories'=>'1,2,3,4,5,6,7,8,9',
    'brands'=>'2,3',
    'users'=>'',
    'coupon_type'=>'Multiple',
    'amount_type'=>'Fixed',
    'amount'=>'200',
    'expiry_date'=>'2024-11-30',
    'status'=>1
    ]
        ];
        Coupon::insert($couponRecords);
    }
}
