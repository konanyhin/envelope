<?php

declare(strict_types=1);

namespace Konanyhin\Envelope;

use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Wrapper;
use Konanyhin\Envelope\Contracts\ElementInterface;

class Body extends ParentElement
{
    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'css-class', 'width',
    ];

    /**
     * List of allowed child element classes for Body.
     *
     * @var class-string<ElementInterface>[]
     */
    protected array $allowedChildClasses = [
        'addSection' => Section::class,
        'addWrapper' => Wrapper::class,
        'addRaw' => Raw::class,
    ];

    /**
     * @param array{
     *     background-color?: string,
     *     css-class?: string,
     *     width?: string
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
            '<mj-body%s>%s</mj-body>',
            $this->renderAttributes(),
            $this->renderChildren()
        );
    }
}
