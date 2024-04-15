<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('search_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_active')->default(0);
            $table->integer('counter');
            $table->datetime('last_date_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
