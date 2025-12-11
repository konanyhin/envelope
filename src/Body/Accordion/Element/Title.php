<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body\Accordion\Element;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type AccordionElementChildAttributes from Types
 */
class Title extends Element
{
    use Attributable;

    public const string TAG = 'mj-accordion-title';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'background-color', 'color', 'font-family', 'font-size', 'font-style', 'font-weight',
        'letter-spacing', 'line-height', 'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top',
    ];

    /**
     * @param AccordionElementChildAttributes $attributes
     */
    public function __construct(private string $content, array $attributes = [])
    {
        $this->setAttributes($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return $this->renderTag($this->content);
    }
}
