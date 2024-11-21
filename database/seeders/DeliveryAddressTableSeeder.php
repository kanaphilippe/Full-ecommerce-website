<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryAddress;

class DeliveryAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deliveryAddressRecords = [
            ['id'=>1,'user_id'=>1,'name'=>'Foka Philippe','address'=>'via Mazzini 61','city'=>'Alessandria','state'=>'kiki','country'=>'Italy','pincode'=>'2514','mobile'=>'12345678','status'=>1],
            ['id'=>2,'user_id'=>2,'name'=>'De Kana','address'=>'via Cervino 0','city'=>'Torino','state'=>'kiko','country'=>'Italy','pincode'=>'2814','mobile'=>'987456123','status'=>1]
        ];
        DeliveryAddress::insert($deliveryAddressRecords);
    }
}
