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
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'css-class', 'width',
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

    /**
     * @param array{
     *     background-color?: string,
     *     css-class?: string,
     *     width?: string
     * } $attributes
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
