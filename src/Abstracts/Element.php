<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Abstracts;

use Stringable;

abstract class Element implements Stringable
{
    abstract public function render(): string;

    public function __toString(): string
    {
        return $this->render();
    }
}
