<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Head;

use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Traits\Attributable;

class Breakpoint implements ElementInterface
{
    use Attributable;

    /**
     * @var string[]
     */
    private array $allowedAttributes = ['width'];

    /**
     * @param array{
     *     width?: string
     * } $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf('<mj-breakpoint%s />', $this->renderAttributes());
    }
}
