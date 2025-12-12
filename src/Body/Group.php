<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type GroupAttributes from Types
 * @phpstan-import-type ColumnAttributes from Types
 */
final class Group extends ParentElement
{
    /**
     * @var string
     */
    public const TAG = 'mj-group';

    /**
     * List of allowed child element classes for Group.
     *
     * @var array<int, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        Column::class,
        Slot::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'width', 'vertical-align', 'background-color', 'direction', 'css-class',
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
        return $this->renderTag($this->renderChildren());
    }
}
