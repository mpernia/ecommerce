<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('api_user_role', function (Blueprint $table) {
            $table->unsignedBigInteger('api_user_id');
            $table->foreign('api_user_id', 'api_user_id_fk_9685970')->references('id')->on('api_users')->onDelete('cascade');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id', 'role_id_fk_9685970')->references('id')->on('roles')->onDelete('cascade');
        });
    }
};
