<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Head;

use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Traits\Attributable;

class Font implements ElementInterface
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
