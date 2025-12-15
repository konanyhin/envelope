<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type WrapperAttributes from Types
 * @phpstan-import-type SectionAttributes from Types
 * @phpstan-import-type HeroAttributes from Types
 */
final class Wrapper extends ParentElement
{
    public const string TAG = 'mj-wrapper';

    /**
     * List of allowed child element classes for Wrapper.
     *
     * @var array<int, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        Raw::class,
        Section::class,
        Slot::class,
        Hero::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'background-position', 'background-position-x', 'background-position-y', 'background-repeat', 'background-size', 'background-url',
        'border', 'border-bottom', 'border-left', 'border-radius', 'border-right', 'border-top', 'css-class',
        'full-width', 'gap', 'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top', 'text-align',
    ];

    /**
     * @param WrapperAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return $this->renderTag($this->renderChildren());
    }
}
