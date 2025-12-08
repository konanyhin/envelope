<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Contracts;

interface ElementInterface
{
    public function render(): string;
}
