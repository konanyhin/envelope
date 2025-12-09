<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type GroupAttributes from Types
 */
class Group extends ParentElement
{
    public const string TAG = 'mj-group';

    /**
     * List of allowed child element classes for Group.
     *
     * @var array<string, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        'addColumn' => Column::class,
        'addSlot' => Slot::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'direction', 'vertical-align', 'width',
    ];

    /**
     * @param GroupAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf(
            '<mj-group%s>%s</mj-group>',
            $this->renderAttributes(),
            $this->renderChildren()
        );
    }
}
