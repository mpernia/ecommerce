<?php

namespace Ecommerce\Shared\Domain\Exceptions;

class AuthorizationException extends InvalidResponseException
{
    public function __construct($exception)
    {
        parent::__construct(
            $exception
        );
    }
}
{

}
