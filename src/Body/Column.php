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
 * @method Accordion addAccordion(AccordionMainAttributes $attributes = [])
 * @method Button addButton(string $text, ButtonAttributes $attributes = [])
 * @method Carousel addCarousel(CarouselAttributes $attributes = [])
 * @method Divider addDivider(DividerAttributes $attributes = [])
 * @method Image addImage(ImageAttributes $attributes = [])
 * @method Navbar addNavbar(NavbarAttributes $attributes = [])
 * @method Raw addRaw(string $content = '')
 * @method Social addSocial(SocialAttributes $attributes = [])
 * @method Spacer addSpacer(SpacerAttributes $attributes = [])
 * @method Table addTable(string $content, TableAttributes $attributes = [])
 * @method Text addText(string $text, TextAttributes $attributes = [])
 * @method Slot addSlot(string $name)
 */
final class Column extends ParentElement
{
    /**
     * @var string
     */
    public const TAG = 'mj-column';

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
