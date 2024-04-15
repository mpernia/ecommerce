<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;

use Illuminate\Database\Seeder;

class AvailabilityTableSeeder extends Seeder
{
    public function run()
    {
        $vailability = [
            [
                'id'              => 1,
                'name'            => 'In stock',
                'translation_key' => 'in_stock'
            ],
            [
                'id'              => 2,
                'name'            => 'Out of stock',
                'translation_key' => 'out_of_stock'
            ],
            [
                'id'              => 3,
                'name'            => 'Preorder',
                'translation_key' => 'preorder'
            ],
            [
                'id'              => 4,
                'name'            => 'Backorder',
                'translation_key' => 'backorder'
            ],
        ];

        Availability::insert($vailability);
    }
}
