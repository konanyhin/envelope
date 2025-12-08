<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Exceptions;

class InvalidMethodException extends \BadMethodCallException
{
    public function __construct(string $className, string $methodName)
    {
        $message = sprintf(
            'Method %s::%s does not exist.',
            $className,
            $methodName
        );

        parent::__construct($message);
    }
}
