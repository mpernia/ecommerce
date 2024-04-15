<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('favorite_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_active')->default(0)->nullable();
            $table->decimal('price', 15, 2);
            $table->decimal('price_target', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
