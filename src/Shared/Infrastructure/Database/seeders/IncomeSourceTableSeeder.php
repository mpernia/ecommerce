<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\IncomeSource;
use Illuminate\Database\Seeder;

class IncomeSourceTableSeeder extends Seeder
{
    public function run()
    {
        $incomeSource = [
            [
                'id' => 1,
                'name' => 'Direct Sales',
                'fee_percent' => 21
            ],
            [
                'id' => 2,
                'name' => 'Affiliate Commissions',
                'fee_percent' => 21
            ],
            [
                'id' => 3,
                'name' => 'Additional Sales',
                'fee_percent' => 21
            ],
            [
                'id' => 4,
                'name' => 'Cross-selling',
                'fee_percent' => 21
            ],
            [
                'id' => 5,
                'name' => 'Up-selling',
                'fee_percent' => 21
            ],
            [
                'id' => 6,
                'name' => 'Direct Advertising',
                'fee_percent' => 21
            ],
            [
                'id' => 7,
                'name' => 'Sponsorships',
                'fee_percent' => 21
            ],
            [
                'id' => 8,
                'name' => 'Collaborations',
                'fee_percent' => 21
            ],
        ];
        IncomeSource::insert($incomeSource);
    }
}
