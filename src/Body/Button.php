<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type ButtonAttributes from Types
 */
final class Button extends Element
{
    use Attributable;

    /**
     * @var string
     */
    public const TAG = 'mj-button';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'background-color', 'border', 'border-bottom', 'border-left', 'border-radius', 'border-right',
        'border-top', 'color', 'container-background-color', 'css-class', 'font-family', 'font-size', 'font-style',
        'font-weight', 'height', 'href', 'inner-padding', 'letter-spacing', 'line-height', 'padding',
        'padding-bottom', 'padding-left', 'padding-right', 'padding-top', 'rel', 'target', 'text-align',
        'text-decoration', 'text-transform', 'title', 'vertical-align', 'width',
    ];

    /**
     * @param ButtonAttributes $attributes
     */
    public function __construct(private string $text, array $attributes = [])
    {
        $this->setAttributes($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return $this->renderTag($this->text);
    }
}
