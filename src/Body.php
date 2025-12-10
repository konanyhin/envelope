<?php

declare(strict_types=1);

namespace Konanyhin\Envelope;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Slot;
use Konanyhin\Envelope\Body\Wrapper;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type BodyAttributes from Types
 * @phpstan-import-type SectionAttributes from Types
 * @phpstan-import-type WrapperAttributes from Types
 *
 * @method self addSection(SectionAttributes $attributes = [])
 * @method self addWrapper(WrapperAttributes $attributes = [])
 * @method self addRaw(string $content = '')
 * @method self addSlot(string $name)
 */
class Body extends ParentElement
{
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
        return sprintf(
            '<mj-body%s>%s</mj-body>',
            $this->renderAttributes(),
            $this->renderChildren()
        );
    }
}
