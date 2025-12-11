<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body\Carousel;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type CarouselImageAttributes from Types
 */
final class Image extends Element
{
    use Attributable;

    /**
     * @var string
     */
    public const TAG = 'mj-carousel-image';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'alt', 'css-class', 'href', 'rel', 'src', 'target', 'thumbnails-src', 'title',
    ];

    /**
     * @param CarouselImageAttributes $attributes
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
