<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;

class Raw extends Element
{
    public const string TAG = 'mj-raw';

    private string $content;

    public function __construct(string $content = '')
    {
        $this->content = $content;
    }

    public function render(): string
    {
        return $this->renderTag($this->content);
    }
}
