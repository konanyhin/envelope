<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Head;

use Konanyhin\Envelope\Contracts\ElementInterface;

class Preview implements ElementInterface
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function render(): string
    {
        return sprintf('<mj-preview>%s</mj-preview>', $this->content);
    }
}
