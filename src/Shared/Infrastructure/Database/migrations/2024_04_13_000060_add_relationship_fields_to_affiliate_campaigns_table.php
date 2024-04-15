<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('affiliate_campaigns', function (Blueprint $table) {
            $table->unsignedBigInteger('affiliate_id')->nullable();
            $table->foreign('affiliate_id', 'affiliate_fk_9680891')->references('id')->on('affiliates');
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->foreign('campaign_id', 'campaign_fk_9680892')->references('id')->on('campaigns');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_9680896')->references('id')->on('users');
        });
    }
};
