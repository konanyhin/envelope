<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Contracts\ElementInterface;

class Wrapper extends ParentElement
{
    public const TAG = 'mj-wrapper';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'background-position', 'background-repeat', 'background-size', 'background-url',
        'border', 'border-bottom', 'border-left', 'border-radius', 'border-right', 'border-top', 'css-class',
        'full-width', 'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top', 'text-align',
    ];

    /**
     * List of allowed child element classes for Wrapper.
     *
     * @var array<string, class-string<ElementInterface>>
     */
    protected array $allowedChildClasses = [
        'addRaw' => Raw::class,
        'addSection' => Section::class,
    ];

    /**
     * @param array{
     *     background-color: string,
     *     background-position: string,
     *     background-repeat: string,
     *     background-size: string,
     *     background-url: string,
     *     border: string,
     *     border-bottom: string,
     *     border-left: string,
     *     border-radius: string,
     *     border-right: string,
     *     border-top: string,
     *     css-class: string,
     *     full-width: string,
     *     padding: string,
     *     padding-bottom: string,
     *     padding-left: string,
     *     padding-right: string,
     *     padding-top: string,
     *     text-align: string
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
            '<mj-wrapper%s>%s</mj-wrapper>',
            $this->renderAttributes(),
            $this->renderChildren()
        );
    }
}
