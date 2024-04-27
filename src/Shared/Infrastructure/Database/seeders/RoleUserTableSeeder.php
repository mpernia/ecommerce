<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\User;
use Ecommerce\Shared\Domain\RoleType;
use Ecommerce\Shared\Domain\UserType;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        User::findOrFail(UserType::ADMIN->value)
            ->roles()
            ->sync([RoleType::ADMIN->value]);
        User::findOrFail(UserType::ADVERTISER->value)
            ->roles()
            ->sync([RoleType::ADVERTISER->value, RoleType::AFFILIATE->value]);
        User::findOrFail(UserType::AFFILIATE->value)
            ->roles()
            ->sync([RoleType::AFFILIATE->value]);
        User::findOrFail(UserType::CUSTOMER->value)
            ->roles()
            ->sync([RoleType::CUSTOMER->value]);
    }
}
