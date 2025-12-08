<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Abstracts;

abstract class Element implements \Stringable
{
    public function __toString(): string
    {
        return $this->render();
    }

    abstract public function render(): string;
}
