<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type HeroAttributes from Types
 */
class Hero extends ParentElement
{
    public const string TAG = 'mj-hero';

    /**
     * List of allowed child element classes for Hero.
     *
     * @var array<string, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        'addButton' => Button::class,
        'addImage' => Image::class,
        'addRaw' => Raw::class,
        'addText' => Text::class,
        'addSlot' => Slot::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'background-height', 'background-position', 'background-url', 'background-width',
        'height', 'mode', 'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top',
        'vertical-align', 'width',
    ];

    /**
     * @param HeroAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf(
            '<mj-hero%s>%s</mj-hero>',
            $this->renderAttributes(),
            $this->renderChildren()
        );
    }
}
