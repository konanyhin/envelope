<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Contracts\ElementInterface;

class Group extends ParentElement
{
    public const string TAG = 'mj-group';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'direction', 'vertical-align', 'width',
    ];

    /**
     * List of allowed child element classes for Group.
     *
     * @var array<string, class-string<ElementInterface>>
     */
    protected array $allowedChildClasses = [
        'addColumn' => Column::class,
    ];

    /**
     * @param array{
     *     background-color: string,
     *     direction: string,
     *     vertical-align: string,
     *     width: string
     * } $attributes
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
