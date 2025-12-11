<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type SpacerAttributes from Types
 */
final class Spacer extends Element
{
    use Attributable;

    /**
     * @var string
     */
    public const TAG = 'mj-spacer';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'container-background-color', 'css-class', 'height', 'padding', 'padding-bottom', 'padding-left', 'padding-right',
        'padding-top',
    ];

    /**
     * @param SpacerAttributes $attributes
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
