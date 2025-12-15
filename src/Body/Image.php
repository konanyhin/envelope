<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type ImageAttributes from Types
 */
final class Image extends Element
{
    use Attributable;

    public const string TAG = 'mj-image';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'alt', 'border', 'border-bottom', 'border-left', 'border-right', 'border-top', 'border-radius',
        'container-background-color', 'css-class', 'fluid-on-mobile', 'height', 'href', 'name', 'padding', 'padding-bottom',
        'padding-left', 'padding-right', 'padding-top', 'rel', 'sizes', 'src', 'srcset', 'target', 'title', 'usemap', 'width',
    ];

    /**
     * @param ImageAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->setAttributes($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return $this->renderTag();
    }
}
