<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bannerRecords = [
            ['id'=>1,'type'=>'Slider','image'=>'message-live-chat-communication-concept.jpg','link'=>'','title'=>'Mobile Collection','alt'=>'Mobile Collection','sort'=>1,'status'=>1],
            ['id'=>2,'type'=>'Slider','image'=>'business-people-looking-chart-office.jpg','link'=>'','title'=>'Woman Collection','alt'=>'Woman Collection','sort'=>2,'status'=>1]
        ];
        Banner::insert($bannerRecords);
    }
}
