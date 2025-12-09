<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type ColumnAttributes from Types
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
        return sprintf(
            '<mj-column%s>%s</mj-column>',
            $this->renderAttributes(),
            $this->renderChildren()
        );
    }
}
