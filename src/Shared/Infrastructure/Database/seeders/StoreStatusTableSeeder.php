<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\StoreStatus;
use Illuminate\Database\Seeder;

class StoreStatusTableSeeder extends Seeder
{
    public function run()
    {
        $storeStatus = [
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
                'name'            => 'Under Review',
            ],
            [
                'id'              => 4,
                'name'            => 'Suspended',
            ],
            [
                'id'              => 5,
                'name'            => 'Pending Approval',
            ],
            [
                'id'              => 6,
                'name'            => 'Approved',
            ],
            [
                'id'              => 7,
                'name'            => 'Rejected',
            ],
            [
                'id'              => 8,
                'name'            => 'Closed',
            ],
            [
                'id'              => 9,
                'name'            => 'On Vacation',
            ],
            [
                'id'              => 10,
                'name'            => 'On Hold',
            ],
            [
                'id'              => 11,
                'name'            => 'Restricted',
            ],
            [
                'id'              => 12,
                'name'            => 'Expired',
            ],
            [
                'id'              => 13,
                'name'            => 'Deleted',
            ],
            [
                'id'              => 14,
                'name'            => 'Pending Verification',
            ],
            [
                'id'              => 15,
                'name'            => 'Blocked',
            ],
            [
                'id'              => 16,
                'name'            => 'Limited Access',
            ],
            [
                'id'              => 17,
                'name'            => 'Temporarily Unavailable',
            ],
            [
                'id'              => 18,
                'name'            => 'Frozen',
            ],
            [
                'id'              => 19,
                'name'            => 'Terminated',
            ],
            [
                'id'              => 20,
                'name'            => 'Pending Payment',
            ],
        ];

        StoreStatus::insert($storeStatus);
    }
}
