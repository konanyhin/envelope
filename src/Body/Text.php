<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type TextAttributes from Types
 */
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
     * @param TextAttributes $attributes
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
