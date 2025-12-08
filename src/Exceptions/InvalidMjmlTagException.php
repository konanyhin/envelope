<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Exceptions;

use InvalidArgumentException;

class InvalidMjmlTagException extends InvalidArgumentException
{
    public function __construct(string $tagName)
    {
        $message = sprintf(
            'Invalid MJML element for attributes: %s',
            $tagName
        );

        parent::__construct($message);
    }
}
