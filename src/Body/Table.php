<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Traits\Attributable;

class Table implements ElementInterface
{
    use Attributable;

    public const TAG = 'mj-table';

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
     * @param array{
     *     align: string,
     *     cellpadding: string,
     *     cellspacing: string,
     *     color: string,
     *     container-background-color: string,
     *     font-family: string,
     *     font-size: string,
     *     line-height: string,
     *     padding: string,
     *     padding-bottom: string,
     *     padding-left: string,
     *     padding-right: string,
     *     padding-top: string,
     *     table-layout: string,
     *     width: string
     * } $attributes
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
