<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        App\Models\User::all()->each(function (App\Models\User $user) {
            $user->update([
                'verified'    => true,
                'verified_at' => now(),
            ]);
        });
    }
};
