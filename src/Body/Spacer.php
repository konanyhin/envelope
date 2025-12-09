<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type SpacerAttributes from Types
 */
class Spacer extends Element
{
    use Attributable;

    public const string TAG = 'mj-spacer';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'container-background-color', 'height', 'padding', 'padding-bottom', 'padding-left', 'padding-right',
        'padding-top', 'vertical-align',
    ];

    /**
     * @param SpacerAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf('<mj-spacer%s />', $this->renderAttributes());
    }
}
