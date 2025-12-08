<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Exceptions;

class InvalidAttributeException extends \InvalidArgumentException
{
    /**
     * @param string[] $invalidKeys
     */
    public function __construct(string $className, array $invalidKeys)
    {
        $message = sprintf(
            'Invalid attribute(s) for %s: %s',
            $className,
            implode(', ', $invalidKeys)
        );

        parent::__construct($message);
    }
}
