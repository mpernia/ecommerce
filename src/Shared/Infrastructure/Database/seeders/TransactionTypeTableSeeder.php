<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\TransactionType;
use Illuminate\Database\Seeder;

class TransactionTypeTableSeeder extends Seeder
{
    public function run()
    {
        $transactionType = [
            [
                'id'              => 1,
                'name'            => 'Commission Payment',
            ],
            [
                'id'              => 2,
                'name'            => 'Referral Payment',
            ],
            [
                'id'              => 3,
                'name'            => 'Affiliate Payout',
            ],
            [
                'id'              => 4,
                'name'            => 'Sales Revenue',
            ],
            [
                'id'              => 5,
                'name'            => 'Ad Revenue',
            ],
            [
                'id'              => 6,
                'name'            => 'Lead Payment',
            ],
            [
                'id'              => 7,
                'name'            => 'Click Payment',
            ],
            [
                'id'              => 8,
                'name'            => 'Impression Payment',
            ],
            [
                'id'              => 9,
                'name'            => 'Flat Fee Payment',
            ],
            [
                'id'              => 10,
                'name'            => 'Subscription Payment',
            ],
            [
                'id'              => 11,
                'name'            => 'Royalty Payment',
            ],
            [
                'id'              => 12,
                'name'            => 'Performance Bonus',
            ],
            [
                'id'              => 13,
                'name'            => 'Rewards Payment',
            ],
            [
                'id'              => 14,
                'name'            => 'Incentive Payment',
            ],
            [
                'id'              => 15,
                'name'            => 'Rental Payment',
            ],
            [
                'id'              => 16,
                'name'            => 'Sponsorship Payment',
            ],
            [
                'id'              => 17,
                'name'            => 'Ad Placement Payment',
            ],
            [
                'id'              => 18,
                'name'            => 'Product Refund',
            ],
            [
                'id'              => 19,
                'name'            => 'Service Refund',
            ],
            [
                'id'              => 20,
                'name'            => 'Chargeback',
            ],
        ];
        TransactionType::insert($transactionType);
    }
}
