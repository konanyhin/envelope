<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type DividerAttributes from Types
 */
final class Divider extends Element
{
    use Attributable;

    public const string TAG = 'mj-divider';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'border-color', 'border-style', 'border-width', 'container-background-color', 'css-class', 'padding', 'padding-bottom',
        'padding-left', 'padding-right', 'padding-top', 'width',
    ];

    /**
     * @param DividerAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->setAttributes($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return $this->renderTag();
    }
}
