<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type ColumnAttributes from Types
 * @phpstan-import-type AccordionMainAttributes from Types
 * @phpstan-import-type ButtonAttributes from Types
 * @phpstan-import-type CarouselAttributes from Types
 * @phpstan-import-type DividerAttributes from Types
 * @phpstan-import-type ImageAttributes from Types
 * @phpstan-import-type NavbarAttributes from Types
 * @phpstan-import-type SocialAttributes from Types
 * @phpstan-import-type SpacerAttributes from Types
 * @phpstan-import-type TableAttributes from Types
 * @phpstan-import-type TextAttributes from Types
 */
final class Column extends ParentElement
{
    public const string TAG = 'mj-column';

    /**
     * List of allowed child element classes for Column.
     *
     * @var array<int, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        Accordion::class,
        Button::class,
        Carousel::class,
        Divider::class,
        Image::class,
        Navbar::class,
        Raw::class,
        Social::class,
        Spacer::class,
        Table::class,
        Text::class,
        Slot::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'inner-background-color', 'border', 'border-bottom', 'border-left', 'border-right', 'border-top',
        'border-radius', 'inner-border', 'inner-border-bottom', 'inner-border-left', 'inner-border-right', 'inner-border-top',
        'inner-border-radius', 'width', 'vertical-align', 'padding', 'padding-top', 'padding-bottom', 'padding-left',
        'padding-right', 'css-class',
    ];

    /**
     * @param ColumnAttributes $attributes
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
