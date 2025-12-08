<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Head;

use Konanyhin\Envelope\Abstracts\Element as AbstractElement;
use Konanyhin\Envelope\Head\Attributes\Element;

class Attributes extends AbstractElement
{
    /** @var Element[] */
    private array $children = [];

    /**
     * @param string $element    The MJML element name (e.g., 'text', 'button').
     * @param array  $attributes the attributes to apply to the element
     *
     * @return $this
     */
    public function add(string $element, array $attributes): self
    {
        $this->children[] = new Element('mj-' . $element, $attributes);

        return $this;
    }

    public function addAll(array $attributes): self
    {
        $this->children[] = new Element('mj-all', $attributes);

        return $this;
    }

    /**
     * @param array<string, mixed> $attributes
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

        return sprintf(
            "<mj-attributes>\n%s</mj-attributes>",
            $children
        );
    }
}
