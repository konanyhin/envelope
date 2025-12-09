<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body\Carousel;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type CarouselImageAttributes from Types
 */
class Image extends Element
{
    use Attributable;

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'alt', 'href', 'rel', 'src', 'target', 'thumbnails-src', 'title',
    ];

    /**
     * @param CarouselImageAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf('<mj-carousel-image%s />', $this->renderAttributes());
    }
}
