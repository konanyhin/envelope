<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type TableAttributes from Types
 */
final class Table extends Element
{
    use Attributable;

    public const string TAG = 'mj-table';

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'border', 'cellpadding', 'cellspacing', 'color', 'container-background-color', 'css-class', 'font-family', 'font-size',
        'line-height', 'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top', 'role', 'table-layout', 'width',
    ];

    /**
     * @param TableAttributes $attributes
     */
    public function __construct(private string $content = '', array $attributes = [])
    {
        $this->setAttributes($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return $this->renderTag($this->content);
    }
}
