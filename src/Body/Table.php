<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type TableAttributes from Types
 */
class Table extends Element
{
    use Attributable;

    public const string TAG = 'mj-table';

    private string $content;

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'cellpadding', 'cellspacing', 'color', 'container-background-color', 'font-family', 'font-size',
        'line-height', 'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top', 'table-layout',
        'width',
    ];

    /**
     * @param string $content
     * @param TableAttributes $attributes
     */
    public function __construct(string $content, array $attributes = [])
    {
        $this->content = $content;
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf(
            '<mj-table%s>%s</mj-table>',
            $this->renderAttributes(),
            $this->content
        );
    }
}
