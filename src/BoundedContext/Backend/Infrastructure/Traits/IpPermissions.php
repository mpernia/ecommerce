<?php

namespace Ecommerce\BoundedContext\Backend\Infrastructure\Traits;

use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\KnownHost;

trait IpPermissions
{
    public function authIpAddress()
    {
        return KnownHost::where( 'ip_address', request()->ip() )->exists();
    }
}
