<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;


use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Permission;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $adminPermissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($adminPermissions->pluck('id'));

        $advertiserPermissions = $adminPermissions->filter(function ($permission) {
            return str_starts_with($permission->key, 'advertiser_')
                || str_starts_with($permission->key, 'store_')
                || str_starts_with($permission->key, 'note_')
                || str_starts_with($permission->key, 'document_')
                || str_starts_with($permission->key, 'transaction_')
                || str_starts_with($permission->key, 'campaign_')
                || str_starts_with($permission->key, 'sale_');
        });
        Role::findOrFail(2)->permissions()->sync($advertiserPermissions);

        $affiliatePermissions = $adminPermissions->filter(function ($permission) {
            return str_starts_with($permission->key, 'affiliate_')
                || str_starts_with($permission->key, 'lead_');
        });
        Role::findOrFail(3)->permissions()->sync($affiliatePermissions);

        $userPermissions = $adminPermissions->filter(function ($permission) {
            return str_starts_with($permission->key, 'shopping_')
                || str_starts_with($permission->key, 'my_account_')
                || str_starts_with($permission->key, 'preference_')
                || str_starts_with($permission->key, 'profile_')
                || str_starts_with($permission->key, 'favorite_product_')
                || str_starts_with($permission->key, 'search_history_');
        });
        Role::findOrFail(4)->permissions()->sync($userPermissions);
    }
}
