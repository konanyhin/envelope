<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type HeroAttributes from Types
 * @phpstan-import-type ButtonAttributes from Types
 * @phpstan-import-type ImageAttributes from Types
 * @phpstan-import-type TextAttributes from Types
 */
final class Hero extends ParentElement
{
    /**
     * @var string
     */
    public const TAG = 'mj-hero';

    /**
     * List of allowed child element classes for Hero.
     *
     * @var array<int, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        Button::class,
        Image::class,
        Raw::class,
        Text::class,
        Slot::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'background-height', 'background-position', 'background-url', 'background-width',
        'border-radius', 'height', 'mode', 'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top',
        'vertical-align',
    ];

    /**
     * @param HeroAttributes $attributes
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
