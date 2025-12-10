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
 *
 * @method self addAccordion(AccordionMainAttributes $attributes = [])
 * @method self addButton(string $text, ButtonAttributes $attributes = [])
 * @method self addCarousel(CarouselAttributes $attributes = [])
 * @method self addDivider(DividerAttributes $attributes = [])
 * @method self addImage(ImageAttributes $attributes = [])
 * @method self addNavbar(NavbarAttributes $attributes = [])
 * @method self addRaw(string $content = '')
 * @method self addSocial(SocialAttributes $attributes = [])
 * @method self addSpacer(SpacerAttributes $attributes = [])
 * @method self addTable(string $content, TableAttributes $attributes = [])
 * @method self addText(string $text, TextAttributes $attributes = [])
 * @method self addSlot(string $name)
 */
class Column extends ParentElement
{
    public const string TAG = 'mj-column';

    /**
     * List of allowed child element classes for Column.
     *
     * @var array<string, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        'addAccordion' => Accordion::class,
        'addButton' => Button::class,
        'addCarousel' => Carousel::class,
        'addDivider' => Divider::class,
        'addImage' => Image::class,
        'addNavbar' => Navbar::class,
        'addRaw' => Raw::class,
        'addSocial' => Social::class,
        'addSpacer' => Spacer::class,
        'addTable' => Table::class,
        'addText' => Text::class,
        'addSlot' => Slot::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'border', 'border-bottom', 'border-left', 'border-radius', 'border-right', 'border-top',
        'css-class', 'inner-background-color', 'inner-border', 'inner-border-bottom', 'inner-border-left',
        'inner-border-radius', 'inner-border-right', 'inner-border-top', 'padding', 'padding-bottom', 'padding-left',
        'padding-right', 'padding-top', 'vertical-align', 'width',
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
