<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body\Carousel;

use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Traits\Attributable;

class Image implements ElementInterface
{
    use Attributable;

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'alt', 'href', 'rel', 'src', 'target', 'thumbnails-src', 'title',
    ];

    /**
     * @param array{
     *     alt: string,
     *     href: string,
     *     rel: string,
     *     src: string,
     *     target: string,
     *     thumbnails-src: string,
     *     title: string
     * } $attributes
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
