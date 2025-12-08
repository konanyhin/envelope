<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;

class Image extends Element
{
    use Attributable;

    public const string TAG = 'mj-image';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'alt', 'border', 'border-bottom', 'border-left', 'border-radius', 'border-right', 'border-top',
        'container-background-color', 'fluid-on-mobile', 'height', 'href', 'name', 'padding', 'padding-bottom',
        'padding-left', 'padding-right', 'padding-top', 'rel', 'src', 'srcset', 'target', 'title', 'usemap', 'width',
    ];

    /**
     * @param array{
     *     align?: string,
     *     alt?: string,
     *     border?: string,
     *     border-bottom?: string,
     *     border-left?: string,
     *     border-radius?: string,
     *     border-right?: string,
     *     border-top?: string,
     *     container-background-color?: string,
     *     fluid-on-mobile?: string,
     *     height?: string,
     *     href?: string,
     *     name?: string,
     *     padding?: string,
     *     padding-bottom?: string,
     *     padding-left?: string,
     *     padding-right?: string,
     *     padding-top?: string,
     *     rel?: string,
     *     src?: string,
     *     srcset?: string,
     *     target?: string,
     *     title?: string,
     *     usemap?: string,
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
        return sprintf('<mj-image%s />', $this->renderAttributes());
    }
}
