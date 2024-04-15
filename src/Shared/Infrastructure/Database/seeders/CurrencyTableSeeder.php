<?php

namespace Ecommerce\Shared\Infrastructure\Database\seeders;

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\Currency;
use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    public function run()
    {
        $currency_type = [
            [
                'id'              => 1,
                'name'            => 'Euro',
                'code'            => 'EUR',
                'symbol'          => '€',
                'main_currency'   => '1',
            ],
            [
                'id'              => 2,
                'name'            => 'United Kingdom Pounds sterling',
                'code'            => 'GBP',
                'symbol'          => '£',
                'main_currency'   => '0',
            ],
            [
                'id'              => 3,
                'name'            => 'United States Dollar',
                'code'            => 'USD',
                'symbol'          => '$',
                'main_currency'   => '0',
            ],
            [
                'id'              => 4,
                'name'            => 'Japanese yen',
                'code'            => 'JPY',
                'symbol'          => '¥',
                'main_currency'   => '0',
            ],
            [
                'id'              => 5,
                'name'            => 'Russian Ruble',
                'code'            => 'RUB',
                'symbol'          => '₽',
                'main_currency'   => '0',
            ],
            [
                'id'              => 6,
                'name'            => 'Unknown Currency',
                'code'            => 'UNK',
                'symbol'          => '$',
                'main_currency'   => '0',
            ],
        ];

        Currency::insert($currency_type);
    }
}
