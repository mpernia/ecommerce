<?php

namespace Ecommerce\Shared\Domain\Exceptions;

class UrlNotSetException extends InvalidResponseException
{
    public function __construct($code, $message)
    {
        parent::__construct(
            '"error": "Could not send the request because the url has not been set."'
        );
    }
}
