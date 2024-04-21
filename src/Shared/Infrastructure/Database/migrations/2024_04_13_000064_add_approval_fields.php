<?php

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        User::all()->each(function (App\Models\User $user) {
            $user->update([
                'approved' => true,
            ]);
        });
    }
};
