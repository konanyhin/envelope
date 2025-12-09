<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Exceptions;

class SlotNotFoundException extends \InvalidArgumentException
{
    public function __construct(string $slotName, int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf('Slot with name "%s" not found.', $slotName);
        parent::__construct($message, $code, $previous);
    }
}
