<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type SectionAttributes from Types
 * @phpstan-import-type ColumnAttributes from Types
 * @phpstan-import-type GroupAttributes from Types
 *
 * @method self addColumn(ColumnAttributes $attributes = [])
 * @method self addGroup(GroupAttributes $attributes = [])
 * @method self addSlot(string $name)
 */
class Section extends ParentElement
{
    public const string TAG = 'mj-section';

    /**
     * List of allowed child element classes for Section.
     *
     * @var array<string, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        'addColumn' => Column::class,
        'addGroup' => Group::class,
        'addSlot' => Slot::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'background-position', 'background-position-x', 'background-position-y',
        'background-repeat', 'background-size', 'background-url', 'border', 'border-bottom', 'border-left',
        'border-radius', 'border-right', 'border-top', 'css-class', 'direction', 'full-width', 'padding',
        'padding-bottom', 'padding-left', 'padding-right', 'padding-top', 'text-align', 'vertical-align',
    ];

    /**
     * @param SectionAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf(
            '<mj-section%s>%s</mj-section>',
            $this->renderAttributes(),
            $this->renderChildren()
        );
    }
}
