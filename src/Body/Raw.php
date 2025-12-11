<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;

final class Raw extends Element
{
    /**
     * @var string
     */
    public const TAG = 'mj-raw';

    public function __construct(private readonly string $content = '') {}

    public function render(): string
    {
        return $this->renderTag($this->content);
    }
}
