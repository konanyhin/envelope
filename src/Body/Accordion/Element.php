<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body\Accordion;

use Konanyhin\Envelope\Abstracts\Element as BaseElement;
use Konanyhin\Envelope\Body\Accordion\Element\Text;
use Konanyhin\Envelope\Body\Accordion\Element\Title;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type AccordionElementAttributes from Types
 * @phpstan-import-type AccordionElementChildAttributes from Types
 */
final class Element extends BaseElement
{
    use Attributable;

    public const string TAG = 'mj-accordion-element';

    private ?Title $title = null;

    private ?Text $text = null;

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'border', 'css-class', 'font-family', 'icon-align', 'icon-height', 'icon-position',
        'icon-unwrapped-alt', 'icon-unwrapped-url', 'icon-width', 'icon-wrapped-alt', 'icon-wrapped-url',
    ];

    /**
     * @param AccordionElementAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->setAttributes($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    /**
     * @param AccordionElementChildAttributes $attributes
     */
    public function withTitle(string $content, array $attributes = []): self
    {
        $this->title = new Title($content, $attributes);

        return $this;
    }

    /**
     * @param AccordionElementChildAttributes $attributes
     */
    public function withText(string $content, array $attributes = []): self
    {
        $this->text = new Text($content, $attributes);

        return $this;
    }

    public function render(): string
    {
        $childrenContent = implode('', array_map(fn (BaseElement $child): string => $child->render(), array_filter([$this->title, $this->text])));

        return $this->renderTag($childrenContent);
    }
}
