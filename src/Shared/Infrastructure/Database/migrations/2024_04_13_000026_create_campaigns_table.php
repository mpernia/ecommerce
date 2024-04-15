<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->boolean('is_active')->default(0)->nullable();
            $table->string('url')->unique();
            $table->string('utm_source');
            $table->string('utm_medium');
            $table->string('utm_campaign');
            $table->string('utm_term')->nullable();
            $table->string('utm_content')->nullable();
            $table->decimal('pay_per_clic', 15, 2)->nullable();
            $table->decimal('cost_per_lead', 15, 2)->nullable();
            $table->decimal('cost_per_acquisition', 15, 2)->nullable();
            $table->decimal('cost_per_clic', 15, 2)->nullable();
            $table->float('persent_per_sale')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
