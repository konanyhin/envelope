<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body\Social;

use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Traits\Attributable;

class Element implements ElementInterface
{
    use Attributable;

    private string $content;

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'background-color', 'border-radius', 'color', 'font-family', 'font-size', 'font-style',
        'font-weight', 'href', 'icon-height', 'icon-size', 'line-height', 'name', 'padding', 'padding-bottom',
        'padding-left', 'padding-right', 'padding-top', 'rel', 'src', 'target', 'text-decoration', 'title',
        'vertical-align',
    ];

    /**
     * @param array{
     *     align: string,
     *     background-color: string,
     *     border-radius: string,
     *     color: string,
     *     font-family: string,
     *     font-size: string,
     *     font-style: string,
     *     font-weight: string,
     *     href: string,
     *     icon-height: string,
     *     icon-size: string,
     *     line-height: string,
     *     name: string,
     *     padding: string,
     *     padding-bottom: string,
     *     padding-left: string,
     *     padding-right: string,
     *     padding-top: string,
     *     rel: string,
     *     src: string,
     *     target: string,
     *     text-decoration: string,
     *     title: string,
     *     vertical-align: string
     * } $attributes
     */
    public function __construct(string $content = '', array $attributes = [])
    {
        $this->content = $content;
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf(
            '<mj-social-element%s>%s</mj-social-element>',
            $this->renderAttributes(),
            $this->content
        );
    }
}
