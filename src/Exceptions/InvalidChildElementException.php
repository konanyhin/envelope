<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Exceptions;

class InvalidChildElementException extends \InvalidArgumentException
{
    public function __construct(string $childClass, string $parentClass)
    {
        $message = sprintf(
            'Element of type %s is not an allowed child for %s.',
            $childClass,
            $parentClass
        );

        parent::__construct($message);
    }
}
