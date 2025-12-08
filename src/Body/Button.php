<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Traits\Attributable;

class Button implements ElementInterface
{
    use Attributable;

    public const TAG = 'mj-button';

    private string $text;

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'background-color', 'border', 'border-bottom', 'border-left', 'border-radius', 'border-right',
        'border-top', 'color', 'container-background-color', 'font-family', 'font-size', 'font-style',
        'font-weight', 'height', 'href', 'inner-padding', 'letter-spacing', 'line-height', 'padding',
        'padding-bottom', 'padding-left', 'padding-right', 'padding-top', 'rel', 'target', 'text-align',
        'text-decoration', 'text-transform', 'vertical-align', 'width',
    ];

    /**
     * @param array{
     *     align: string,
     *     background-color: string,
     *     border: string,
     *     border-bottom: string,
     *     border-left: string,
     *     border-radius: string,
     *     border-right: string,
     *     border-top: string,
     *     color: string,
     *     container-background-color: string,
     *     font-family: string,
     *     font-size: string,
     *     font-style: string,
     *     font-weight: string,
     *     height: string,
     *     href: string,
     *     inner-padding: string,
     *     letter-spacing: string,
     *     line-height: string,
     *     padding: string,
     *     padding-bottom: string,
     *     padding-left: string,
     *     padding-right: string,
     *     padding-top: string,
     *     rel: string,
     *     target: string,
     *     text-align: string,
     *     text-decoration: string,
     *     text-transform: string,
     *     vertical-align: string,
     *     width: string
     * } $attributes
     */
    public function __construct(string $text, array $attributes = [])
    {
        $this->text = $text;
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf(
            '<mj-button%s>%s</mj-button>',
            $this->renderAttributes(),
            $this->text
        );
    }
}
