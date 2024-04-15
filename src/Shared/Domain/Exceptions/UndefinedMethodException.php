<?php

namespace Ecommerce\Shared\Domain\Exceptions;

class UndefinedMethodException extends InvalidResponseException
{
    public function __construct($method, $class)
    {
        parent::__construct(
            jsonEncode([
                'error'   => ' Undefined method',
                'message' => sprintf('Call to undefined method %s::%s()', $method, $class)
            ])
        );
    }
}
