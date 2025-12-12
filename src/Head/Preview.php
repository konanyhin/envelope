<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Head;

use Konanyhin\Envelope\Abstracts\Element;

final class Preview extends Element
{
    /**
     * @var string
     */
    public const TAG = 'mj-preview';

    public function __construct(private readonly string $content = '') {}

    public function render(): string
    {
        return $this->renderTag($this->content);
    }
}
