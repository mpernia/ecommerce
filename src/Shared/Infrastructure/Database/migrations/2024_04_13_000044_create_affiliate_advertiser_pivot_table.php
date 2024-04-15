<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('affiliate_advertiser', function (Blueprint $table) {
            $table->unsignedBigInteger('affiliate_id');
            $table->foreign('affiliate_id', 'affiliate_id_fk_9689004')->references('id')->on('affiliates')->onDelete('cascade');
            $table->unsignedBigInteger('advertiser_id');
            $table->foreign('advertiser_id', 'advertiser_id_fk_9689004')->references('id')->on('advertisers')->onDelete('cascade');
        });
    }
};
