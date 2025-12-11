<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Body\Carousel\Image;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type CarouselAttributes from Types
 * @phpstan-import-type CarouselImageAttributes from Types
 *
 * @method Image addCarouselImage(CarouselImageAttributes $attributes = [])
 */
final class Carousel extends ParentElement
{
    use Attributable;

    /**
     * @var string
     */
    public const TAG = 'mj-carousel';

    /**
     * @var array<string, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        'addCarouselImage' => Image::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'border-radius', 'container-background-color', 'css-class', 'icon-width', 'left-icon', 'right-icon',
        'tb-border', 'tb-border-radius', 'tb-hover-border-color', 'tb-selected-border-color', 'tb-width', 'thumbnails',
    ];

    /**
     * @param CarouselAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return $this->renderTag($this->renderChildren());
    }
}
