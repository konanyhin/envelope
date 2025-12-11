<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Exceptions;

class InvalidMjmlOptionException extends \InvalidArgumentException
{
    public function __construct(string $option)
    {
        parent::__construct(sprintf('Invalid MJML option provided: %s', $option));
    }
}
