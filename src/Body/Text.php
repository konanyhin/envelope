<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;

class Text extends Element
{
    use Attributable;

    public const string TAG = 'mj-text';

    private string $text;

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'color', 'container-background-color', 'font-family', 'font-size', 'font-style', 'font-weight',
        'height', 'letter-spacing', 'line-height', 'padding', 'padding-bottom', 'padding-left', 'padding-right',
        'padding-top', 'text-decoration', 'text-transform',
    ];

    /**
     * @param array{
     *     align?: string,
     *     color?: string,
     *     container-background-color?: string,
     *     font-family?: string,
     *     font-size?: string,
     *     font-style?: string,
     *     font-weight?: string,
     *     height?: string,
     *     letter-spacing?: string,
     *     line-height?: string,
     *     padding?: string,
     *     padding-bottom?: string,
     *     padding-left?: string,
     *     padding-right?: string,
     *     padding-top?: string,
     *     text-decoration?: string,
     *     text-transform?: string
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
            '<mj-text%s>%s</mj-text>',
            $this->renderAttributes(),
            $this->text
        );
    }
}
