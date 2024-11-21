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
        Schema::table('orders', function ($table) {
            $table->string('courier_name')->after('grand_total');
            $table->string('tracking_number')->after('courier_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function ($table) {
            $table->dropColumn('courier_name');
            $table->dropColumn('tracking_number');
        });
    }
};
