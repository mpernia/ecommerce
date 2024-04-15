<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_9688904')->references('id')->on('products');
            $table->unsignedBigInteger('advertiser_id')->nullable();
            $table->foreign('advertiser_id', 'advertiser_fk_9688905')->references('id')->on('advertisers');
            $table->unsignedBigInteger('tracking_id')->nullable();
            $table->foreign('tracking_id', 'tracking_fk_9688920')->references('id')->on('leads');
        });
    }
};
