<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body\Accordion\Element;

use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Traits\Attributable;

class Text implements ElementInterface
{
    use Attributable;

    private string $content;

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'color', 'font-family', 'font-size', 'font-style', 'font-weight',
        'letter-spacing', 'line-height', 'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top',
    ];

    /**
     * @param array{
     *     background-color: string,
     *     color: string,
     *     font-family: string,
     *     font-size: string,
     *     font-style: string,
     *     font-weight: string,
     *     letter-spacing: string,
     *     line-height: string,
     *     padding: string,
     *     padding-bottom: string,
     *     padding-left: string,
     *     padding-right: string,
     *     padding-top: string
     * } $attributes
     */
    public function __construct(string $content, array $attributes = [])
    {
        $this->content = $content;
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf(
            '<mj-accordion-text%s>%s</mj-accordion-text>',
            $this->renderAttributes(),
            $this->content
        );
    }
}
