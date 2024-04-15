<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->unsignedBigInteger('affiliate_campaign_id')->nullable();
            $table->foreign('affiliate_campaign_id', 'affiliate_campaign_fk_9688886')->references('id')->on('affiliate_campaigns');
        });
    }
};
