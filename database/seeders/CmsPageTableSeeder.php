<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CmsPage;

class CmsPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cmsPageRecords = [
            ['id'=>1,'title'=>'About Us','description'=>'Content is Coming Soon','url'=>'about-us','meta_title'=>'About Us','meta_description'=>'About Us Content','meta_keywords'=>'about us, about','status'=>1],
            ['id'=>2,'title'=>'Terms & Conditions','description'=>'Content is Coming Soon','url'=>'terms-condition','meta_title'=>'Terms & Conditions','meta_description'=>'Terms & Conditions','meta_keywords'=>'terms, terms condition','status'=>1],
            ['id'=>3,'title'=>'Privacy Policy','description'=>'Content is Coming Soon','url'=>'privacy-policy','meta_title'=>'Privacy Policy','meta_description'=>'Privacy Policy Content','meta_keywords'=>'privacy policy','status'=>1],
        ];
        CmsPage::insert($cmsPageRecords);
    }
}
