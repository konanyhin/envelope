<?php

declare(strict_types=1);

namespace Konanyhin\Envelope;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Slot;
use Konanyhin\Envelope\Body\Wrapper;

/**
 * @phpstan-import-type BodyAttributes from Types
 * @phpstan-import-type SectionAttributes from Types
 * @phpstan-import-type WrapperAttributes from Types
 *
 * @method Section addSection(SectionAttributes $attributes = [])
 * @method Wrapper addWrapper(WrapperAttributes $attributes = [])
 * @method Raw addRaw(string $content = '')
 * @method Slot addSlot(string $name)
 */
final class Body extends ParentElement
{
    /**
     * @var string
     */
    public const TAG = 'mj-body';

    /**
     * List of allowed child element classes for Body.
     *
     * @var array<string, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        'addSection' => Section::class,
        'addWrapper' => Wrapper::class,
        'addRaw' => Raw::class,
        'addSlot' => Slot::class,
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
