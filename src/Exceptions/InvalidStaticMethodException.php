<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Exceptions;

class InvalidStaticMethodException extends \BadMethodCallException
{
    public function __construct(string $methodName)
    {
        $message = sprintf(
            'Static method %s does not exist.',
            $methodName
        );

        parent::__construct($message);
    }
}
