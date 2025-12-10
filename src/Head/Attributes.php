<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Head;

use Konanyhin\Envelope\Abstracts\Element as AbstractElement;
use Konanyhin\Envelope\Head\Attributes\Element;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type HeadAttributesElementAttributes from Types
 */
class Attributes extends AbstractElement
{
    public const string TAG = 'mj-attributes';

    /** @var Element[] */
    private array $children = [];

    /**
     * @param string $element The MJML element name (e.g., 'text', 'button').
     * @param HeadAttributesElementAttributes $attributes the attributes to apply to the element
     *
     * @return $this
     */
    public function add(string $element, array $attributes): self
    {
        $this->children[] = new Element('mj-' . $element, $attributes);

        return $this;
    }

    /**
     * @param HeadAttributesElementAttributes $attributes
     */
    public function addAll(array $attributes): self
    {
        $this->children[] = new Element('mj-all', $attributes);

        return $this;
    }

    /**
     * @param HeadAttributesElementAttributes $attributes
     */
    public function addClass(string $className, array $attributes): self
    {
        $attributes['name'] = $className;
        $this->children[] = new Element('mj-class', $attributes);

        return $this;
    }

    public function render(): string
    {
        $children = implode('', array_map(fn (Element $child): string => $child->render(), $this->children));

        return $this->renderTag($children);
    }
}
