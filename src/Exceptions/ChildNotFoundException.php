<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Exceptions;

class ChildNotFoundException extends \InvalidArgumentException
{
    public function __construct(string $childClass, string $parentClass, int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf('Child of type "%s" not found in parent "%s".', $childClass, $parentClass);
        parent::__construct($message, $code, $previous);
    }
}
