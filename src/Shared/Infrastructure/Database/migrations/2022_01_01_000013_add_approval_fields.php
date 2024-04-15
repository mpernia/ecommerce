<?php

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\User;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        User::all()->each(function (User $user) {
            $user->update([
                'approved' => true,
            ]);
        });
    }
};
