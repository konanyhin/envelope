<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type TextAttributes from Types
 */
final class Text extends Element
{
    use Attributable;

    public const string TAG = 'mj-text';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'color', 'font-family', 'font-size', 'font-style', 'font-weight', 'line-height', 'letter-spacing',
        'height', 'text-decoration', 'text-transform', 'align', 'container-background-color', 'padding',
        'padding-top', 'padding-bottom', 'padding-left', 'padding-right', 'css-class',
    ];

    /**
     * @param TextAttributes $attributes
     */
    public function __construct(private string $text = '', array $attributes = [])
    {
        $this->setAttributes($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return $this->renderTag($this->text);
    }
}
