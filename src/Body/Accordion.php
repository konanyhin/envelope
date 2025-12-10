<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Body\Accordion\Element as AccordionElement;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type AccordionMainAttributes from Types
 */
class Accordion extends Element
{
    use Attributable;

    public const string TAG = 'mj-accordion';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'border', 'container-background-color', 'font-family', 'icon-align', 'icon-height',
        'icon-position', 'icon-unwrapped-alt', 'icon-unwrapped-url', 'icon-width', 'icon-wrapped-alt',
        'icon-wrapped-url', 'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top',
    ];

    /**
     * @var AccordionElement[]
     */
    private array $children = [];

    /**
     * @param AccordionMainAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function addElement(AccordionElement $element): self
    {
        $this->children[] = $element;

        return $this;
    }

    public function render(): string
    {
        $children = implode('', array_map(fn (AccordionElement $child): string => $child->render(), $this->children));

        return $this->renderTag($children);
    }
}
