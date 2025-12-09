<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type DividerAttributes from Types
 */
class Divider extends Element
{
    use Attributable;

    public const string TAG = 'mj-divider';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'border-color', 'border-style', 'border-width', 'container-background-color', 'padding', 'padding-bottom',
        'padding-left', 'padding-right', 'padding-top', 'width',
    ];

    /**
     * @param DividerAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf('<mj-divider%s />', $this->renderAttributes());
    }
}
