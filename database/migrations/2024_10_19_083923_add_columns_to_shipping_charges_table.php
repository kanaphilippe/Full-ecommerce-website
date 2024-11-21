<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('shipping_charges', function (Blueprint $table) {
            $table->float('0_500g')->after('country');
            $table->float('501_1000g')->after('0_500g');
            $table->float('1001_1500g')->after('501_1000g');
            $table->float('1501_2000g')->after('1001_1500g');
            $table->float('2001_2500g')->after('1501_2000g');
            $table->float('2501_3000g')->after('2001_2500g');
            $table->float('3001_3500g')->after('2501_3000g');
            $table->float('3501_4000g')->after('3001_3500g');
            $table->float('4001_4500g')->after('3501_4000g');
            $table->float('4501_5000g')->after('4001_4500g');
            $table->float('Above_5000g')->after('4501_5000g');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipping_charges', function (Blueprint $table) {
            //
        });
    }
};
