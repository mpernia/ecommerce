<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\User;
use Ecommerce\Shared\Domain\UserType;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [];
        foreach (UserType::all() as $user) {
            if ($user['id'] > 3) { continue; }
            $users[] = [
                'id'                 => $user['id'],
                'name'               => $user['name'],
                'email'              => sprintf('%s@app.com', strtolower($user['name'])),
                'email_verified_at'  => '2024-04-13 00:30:33',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2024-04-13 00:30:33',
                'verification_token' => '',
                'two_factor_code'    => '',
            ];
        }

        $users[] = [
            'id'                 => UserType::CUSTOMER->value,
            'name'               => 'User',
            'email'              => 'user@app.com',
            'email_verified_at'  => '2024-04-13 00:30:33',
            'password'           => bcrypt('password'),
            'remember_token'     => null,
            'approved'           => 1,
            'verified'           => 1,
            'verified_at'        => '2024-04-13 00:30:33',
            'verification_token' => '',
            'two_factor_code'    => '',
        ];

        User::insert($users);
    }
}
