<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\AdvertiserStatus;
use Illuminate\Database\Seeder;

class AdvertiserStatusTableSeeder extends Seeder
{
    public function run()
    {
        $advertiserStatus = [
            [
                'id'              => 1,
                'name'            => 'Active',
            ],
            [
                'id'              => 2,
                'name'            => 'Inactive',
            ],
            [
                'id'              => 3,
                'name'            => 'Pending Approval',
            ],
            [
                'id'              => 4,
                'name'            => 'Approved',
            ],
            [
                'id'              => 5,
                'name'            => 'Rejected',
            ],
            [
                'id'              => 6,
                'name'            => 'Suspended',
            ],
            [
                'id'              => 7,
                'name'            => 'Terminated',
            ],
            [
                'id'              => 8,
                'name'            => 'On Hold',
            ],
            [
                'id'              => 9,
                'name'            => 'Blocked',
            ],
            [
                'id'              => 10,
                'name'            => 'Limited Access',
            ],
            [
                'id'              => 11,
                'name'            => 'Temporarily Unavailable',
            ],
            [
                'id'              => 12,
                'name'            => 'Frozen',
            ],
            [
                'id'              => 13,
                'name'            => 'Expired',
            ],
            [
                'id'              => 14,
                'name'            => 'Restricted',
            ],
            [
                'id'              => 15,
                'name'            => 'Under Review',
            ],
            [
                'id'              => 16,
                'name'            => 'Deleted',
            ],
        ];

        AdvertiserStatus::insert($advertiserStatus);
    }
}
