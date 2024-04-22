<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Advertiser',
            ],
            [
                'id'    => 3,
                'title' => 'Affiliate',
            ],
            [
                'id'    => 4,
                'title' => 'User',
            ],
        ];

        Role::insert($roles);
    }
}
