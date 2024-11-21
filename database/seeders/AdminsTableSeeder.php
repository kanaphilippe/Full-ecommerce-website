<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('1996');
        $adminRecords = [
            ['id'=>2,'name'=>'william','type'=>'subadmin','mobile'=>1234569,'email'=>'william@subadmin.com','password'=>$password,'image'=>'','status'=>1],
            ['id'=>3,'name'=>'kwemi','type'=>'subadmin','mobile'=>123458769,'email'=>'kwemi@subadmin.com','password'=>$password,'image'=>'','status'=>1], 
        ];
        Admin::insert($adminRecords);
    }
}
