<?php

declare(strict_types=1);

namespace Konanyhin\Envelope;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Body\Hero;
use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Slot;
use Konanyhin\Envelope\Body\Wrapper;

/**
 * @phpstan-import-type BodyAttributes from Types
 * @phpstan-import-type SectionAttributes from Types
 * @phpstan-import-type WrapperAttributes from Types
 * @phpstan-import-type HeroAttributes from Types
 */
final class Body extends ParentElement
{
    public const string TAG = 'mj-body';

    /**
     * List of allowed child element classes for Body.
     *
     * @var array<int, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        Section::class,
        Wrapper::class,
        Raw::class,
        Slot::class,
        Hero::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'css-class', 'width',
    ];

    /**
     * @param BodyAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    /**
     * @param BodyAttributes $attributes
     */
    public static function new(array $attributes = []): self
    {
        return new self($attributes);
    }

    public function render(): string
    {
        return $this->renderTag($this->renderChildren());
    }
}
