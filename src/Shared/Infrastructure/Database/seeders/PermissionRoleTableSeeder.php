<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;


use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Permission;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $client_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->key, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($client_permissions);

        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) === 'user_';
        });
        Role::findOrFail(4)->permissions()->sync($user_permissions);
    }
}
