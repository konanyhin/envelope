<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Contracts\ElementInterface;

class Raw implements ElementInterface
{
    public const TAG = 'mj-raw';

    private string $content;

    public function __construct(string $content = '')
    {
        $this->content = $content;
    }

    public function render(): string
    {
        return sprintf('<mj-raw>%s</mj-raw>', $this->content);
    }
}
