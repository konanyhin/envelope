<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Body\Accordion\Element as AccordionElement;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type AccordionMainAttributes from Types
 * @phpstan-import-type AccordionElementAttributes from Types
 */
final class Accordion extends ParentElement
{
    use Attributable;

    /**
     * @var string
     */
    public const TAG = 'mj-accordion';

    /**
     * @var array<int, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        AccordionElement::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'border', 'container-background-color', 'css-class', 'font-family', 'icon-align', 'icon-height',
        'icon-position', 'icon-unwrapped-alt', 'icon-unwrapped-url', 'icon-width', 'icon-wrapped-alt',
        'icon-wrapped-url', 'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top',
    ];

    /**
     * @param AccordionMainAttributes $attributes
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
