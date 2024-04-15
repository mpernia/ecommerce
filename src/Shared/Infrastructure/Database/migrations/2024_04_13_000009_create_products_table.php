<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->longText('specification')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->string('reference')->nullable()->unique();
            $table->boolean('is_active')->default(0)->nullable();
            $table->string('availability')->nullable();
            $table->string('brand')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
