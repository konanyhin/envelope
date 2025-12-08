<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;

class Divider extends Element
{
    use Attributable;

    public const string TAG = 'mj-divider';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'border-color', 'border-style', 'border-width', 'container-background-color', 'padding', 'padding-bottom',
        'padding-left', 'padding-right', 'padding-top', 'width',
    ];

    /**
     * @param array{
     *     border-color?: string,
     *     border-style?: string,
     *     border-width?: string,
     *     container-background-color?: string,
     *     padding?: string,
     *     padding-bottom?: string,
     *     padding-left?: string,
     *     padding-right?: string,
     *     padding-top?: string,
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
        return sprintf('<mj-divider%s />', $this->renderAttributes());
    }
}
