<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaign_product', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id');
            $table->foreign('campaign_id', 'campaign_id_fk_9688865')->references('id')->on('campaigns')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_9688865')->references('id')->on('products')->onDelete('cascade');
        });
    }
};
