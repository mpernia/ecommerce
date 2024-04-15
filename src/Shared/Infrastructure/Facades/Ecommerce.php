<?php

namespace Ecommerce\Shared\Infrastructure\Facades;

use Illuminate\Support\Facades\Facade;

class Ecommerce extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'Marketplace';
    }
}
