<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Head;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;

class Font extends Element
{
    use Attributable;

    /**
     * @var string[]
     */
    private array $allowedAttributes = ['name', 'href'];

    /**
     * @param array{
     *     name?: string,
     *     href?: string
     * } $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf('<mj-font%s />', $this->renderAttributes());
    }
}
