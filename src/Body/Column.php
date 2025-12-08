<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;

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
     * @param array{
     *     background-color?: string,
     *     border?: string,
     *     border-bottom?: string,
     *     border-left?: string,
     *     border-radius?: string,
     *     border-right?: string,
     *     border-top?: string,
     *     css-class?: string,
     *     inner-background-color?: string,
     *     inner-border?: string,
     *     inner-border-bottom?: string,
     *     inner-border-left?: string,
     *     inner-border-radius?: string,
     *     inner-border-right?: string,
     *     inner-border-top?: string,
     *     padding?: string,
     *     padding-bottom?: string,
     *     padding-left?: string,
     *     padding-right?: string,
     *     padding-top?: string,
     *     vertical-align?: string,
     *     width?: string
     * } $attributes
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
