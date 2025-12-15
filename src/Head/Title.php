<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Head;

use Konanyhin\Envelope\Abstracts\Element;

final class Title extends Element
{
    public const string TAG = 'mj-title';

    public function __construct(private readonly string $content = '') {}

    public function render(): string
    {
        return $this->renderTag($this->content);
    }
}
