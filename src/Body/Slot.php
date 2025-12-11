<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;

class Slot extends Element
{
    public function __construct(private readonly string $name) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function render(): string
    {
        return '';
    }
}
