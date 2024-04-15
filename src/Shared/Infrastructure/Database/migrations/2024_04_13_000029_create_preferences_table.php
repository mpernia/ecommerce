<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sort_product_by')->nullable();
            $table->string('notify_method')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
