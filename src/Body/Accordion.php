<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Body\Accordion\Element;
use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Traits\Attributable;

class Accordion implements ElementInterface
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
     * @var Element[]
     */
    private array $children = [];

    /**
     * @param array{
     *     border: string,
     *     container-background-color: string,
     *     font-family: string,
     *     icon-align: string,
     *     icon-height: string,
     *     icon-position: string,
     *     icon-unwrapped-alt: string,
     *     icon-unwrapped-url: string,
     *     icon-width: string,
     *     icon-wrapped-alt: string,
     *     icon-wrapped-url: string,
     *     padding: string,
     *     padding-bottom: string,
     *     padding-left: string,
     *     padding-right: string,
     *     padding-top: string
     * } $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function addElement(Element $element): self
    {
        $this->children[] = $element;

        return $this;
    }

    public function render(): string
    {
        $children = implode('', array_map(fn(\Konanyhin\Envelope\Body\Accordion\Element $child): string => $child->render(), $this->children));

        return sprintf(
            '<mj-accordion%s>%s</mj-accordion>',
            $this->renderAttributes(),
            $children
        );
    }
}
