<?php

namespace Database\Seeders;

use Ecommerce\Shared\Infrastructure\Database\seeders\PermissionRoleTableSeeder;
use Ecommerce\Shared\Infrastructure\Database\seeders\PermissionsTableSeeder;
use Ecommerce\Shared\Infrastructure\Database\seeders\RolesTableSeeder;
use Ecommerce\Shared\Infrastructure\Database\seeders\RoleUserTableSeeder;
use Ecommerce\Shared\Infrastructure\Database\seeders\UsersTableSeeder;
use Ecommerce\Shared\Infrastructure\Database\seeders\AvailabilityTableSeeder;
use Ecommerce\Shared\Infrastructure\Database\seeders\CurrencyTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            CurrencyTableSeeder::class,
            //AvailabilityTableSeeder::class
        ]);
    }
}
