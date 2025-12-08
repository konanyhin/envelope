<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Body\Carousel\Image;
use Konanyhin\Envelope\Traits\Attributable;

class Carousel extends Element
{
    use Attributable;

    public const string TAG = 'mj-carousel';

    /**
     * @var Image[]
     */
    private array $images = [];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'border-radius', 'container-background-color', 'icon-width', 'left-icon', 'right-icon',
        'tb-border', 'tb-border-radius', 'tb-hover-border-color', 'tb-selected-border-color', 'tb-width', 'thumbnails',
    ];

    /**
     * @param array{
     *     align?: string,
     *     border-radius?: string,
     *     container-background-color?: string,
     *     icon-width?: string,
     *     left-icon?: string,
     *     right-icon?: string,
     *     tb-border?: string,
     *     tb-border-radius?: string,
     *     tb-hover-border-color?: string,
     *     tb-selected-border-color?: string,
     *     tb-width?: string,
     *     thumbnails?: string
     * } $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function addImage(Image $image): self
    {
        $this->images[] = $image;

        return $this;
    }

    public function render(): string
    {
        $images = implode('', array_map(fn (Image $image) => $image->render(), $this->images));

        return sprintf(
            '<mj-carousel%s>%s</mj-carousel>',
            $this->renderAttributes(),
            $images
        );
    }
}
