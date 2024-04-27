<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Role;
use Ecommerce\Shared\Domain\RoleType;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [];
        foreach (RoleType::all() as $role) {
            $roles[] = [
                'id'    => $role['id'],
                'title' => $role['name']
            ];
        }

        Role::insert($roles);
    }
}
