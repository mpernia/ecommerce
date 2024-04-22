<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@app.com',
                'email_verified_at'  => '2024-04-13 00:30:33',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2024-04-13 00:30:33',
                'verification_token' => '',
                'two_factor_code'    => '',
            ],
            [
                'id'                 => 2,
                'name'               => 'Advertiser',
                'email'              => 'advertiser@app.com',
                'email_verified_at'  => '2024-04-13 00:30:33',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2024-04-13 00:30:33',
                'verification_token' => '',
                'two_factor_code'    => '',
            ],
            [
                'id'                 => 3,
                'name'               => 'Affiliate',
                'email'              => 'affiliate@app.com',
                'email_verified_at'  => '2024-04-13 00:30:33',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2024-04-13 00:30:33',
                'verification_token' => '',
                'two_factor_code'    => '',
            ],
            [
                'id'                 => 4,
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
            ],
        ];

        User::insert($users);
    }
}
