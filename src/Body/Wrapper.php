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
 *
 * @method Raw addRaw(string $content = '')
 * @method Section addSection(SectionAttributes $attributes = [])
 * @method Slot addSlot(string $name)
 * @method Hero addHero(HeroAttributes $attributes = [])
 */
final class Wrapper extends ParentElement
{
    /**
     * @var string
     */
    public const TAG = 'mj-wrapper';

    /**
     * List of allowed child element classes for Wrapper.
     *
     * @var array<string, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        'addRaw' => Raw::class,
        'addSection' => Section::class,
        'addSlot' => Slot::class,
        'addHero' => Hero::class,
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
