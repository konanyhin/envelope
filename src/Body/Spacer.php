<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;

class Spacer extends Element
{
    use Attributable;

    public const string TAG = 'mj-spacer';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'container-background-color', 'height', 'padding', 'padding-bottom', 'padding-left', 'padding-right',
        'padding-top', 'vertical-align',
    ];

    /**
     * @param array{
     *     container-background-color?: string,
     *     height?: string,
     *     padding?: string,
     *     padding-bottom?: string,
     *     padding-left?: string,
     *     padding-right?: string,
     *     padding-top?: string,
     *     vertical-align?: string
     * } $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf('<mj-spacer%s />', $this->renderAttributes());
    }
}
