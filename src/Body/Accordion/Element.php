<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body\Accordion;

use Konanyhin\Envelope\Abstracts\Element as BaseElement;
use Konanyhin\Envelope\Body\Accordion\Element\Text;
use Konanyhin\Envelope\Body\Accordion\Element\Title;
use Konanyhin\Envelope\Traits\Attributable;

class Element extends BaseElement
{
    use Attributable;

    private ?Title $title = null;

    private ?Text $text = null;

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'border', 'font-family', 'icon-align', 'icon-height', 'icon-position',
        'icon-unwrapped-alt', 'icon-unwrapped-url', 'icon-width', 'icon-wrapped-alt', 'icon-wrapped-url',
        'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top',
    ];

    /**
     * @param array{
     *     background-color?: string,
     *     border?: string,
     *     font-family?: string,
     *     icon-align?: string,
     *     icon-height?: string,
     *     icon-position?: string,
     *     icon-unwrapped-alt?: string,
     *     icon-unwrapped-url?: string,
     *     icon-width?: string,
     *     icon-wrapped-alt?: string,
     *     icon-wrapped-url?: string,
     *     padding?: string,
     *     padding-bottom?: string,
     *     padding-left?: string,
     *     padding-right?: string,
     *     padding-top?: string
     * } $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    /**
     * @param array{
     *     background-color?: string,
     *     color?: string,
     *     font-family?: string,
     *     font-size?: string,
     *     font-style?: string,
     *     font-weight?: string,
     *     letter-spacing?: string,
     *     line-height?: string,
     *     padding?: string,
     *     padding-bottom?: string,
     *     padding-left?: string,
     *     padding-right?: string,
     *     padding-top?: string
     * } $attributes
     */
    public function withTitle(string $content, array $attributes = []): self
    {
        $this->title = new Title($content, $attributes);

        return $this;
    }

    /**
     * @param array{
     *     background-color?: string,
     *     color?: string,
     *     font-family?: string,
     *     font-size?: string,
     *     font-style?: string,
     *     font-weight?: string,
     *     letter-spacing?: string,
     *     line-height?: string,
     *     padding?: string,
     *     padding-bottom?: string,
     *     padding-left?: string,
     *     padding-right?: string,
     *     padding-top?: string
     * } $attributes
     */
    public function withText(string $content, array $attributes = []): self
    {
        $this->text = new Text($content, $attributes);

        return $this;
    }

    public function render(): string
    {
        $childrenContent = implode('', array_map(fn (BaseElement $child): string => $child->render(), array_filter([$this->title, $this->text])));

        return sprintf(
            '<mj-accordion-element%s>%s</mj-accordion-element>',
            $this->renderAttributes(),
            $childrenContent
        );
    }
}
