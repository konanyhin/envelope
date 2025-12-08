<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Body\Social\Element;
use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Traits\Attributable;

class Social implements ElementInterface
{
    use Attributable;

    public const string TAG = 'mj-social';

    private array $elements = [];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'border-radius', 'color', 'container-background-color', 'font-family', 'font-size', 'font-style',
        'font-weight', 'icon-height', 'icon-size', 'inner-padding', 'line-height', 'mode', 'padding',
        'padding-bottom', 'padding-left', 'padding-right', 'padding-top', 'table-layout', 'text-decoration',
    ];

    /**
     * @param array{
     *     align: string,
     *     border-radius: string,
     *     color: string,
     *     container-background-color: string,
     *     font-family: string,
     *     font-size: string,
     *     font-style: string,
     *     font-weight: string,
     *     icon-height: string,
     *     icon-size: string,
     *     inner-padding: string,
     *     line-height: string,
     *     mode: string,
     *     padding: string,
     *     padding-bottom: string,
     *     padding-left: string,
     *     padding-right: string,
     *     padding-top: string,
     *     table-layout: string,
     *     text-decoration: string
     * } $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function addElement(Element $element): self
    {
        $this->elements[] = $element;

        return $this;
    }

    public function render(): string
    {
        $elements = implode('', array_map(fn ($element) => $element->render(), $this->elements));

        return sprintf(
            '<mj-social%s>%s</mj-social>',
            $this->renderAttributes(),
            $elements
        );
    }
}
