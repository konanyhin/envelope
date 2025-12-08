<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body\Navbar;

use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Traits\Attributable;

class Link implements ElementInterface
{
    use Attributable;

    private string $content;

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'color', 'font-family', 'font-size', 'font-style', 'font-weight', 'href', 'letter-spacing', 'line-height',
        'padding', 'padding-bottom', 'padding-left', 'padding-right', 'padding-top', 'rel', 'target',
        'text-decoration', 'text-transform',
    ];

    /**
     * @param array{
     *     color?: string,
     *     font-family?: string,
     *     font-size?: string,
     *     font-style?: string,
     *     font-weight?: string,
     *     href?: string,
     *     letter-spacing?: string,
     *     line-height?: string,
     *     padding?: string,
     *     padding-bottom?: string,
     *     padding-left?: string,
     *     padding-right?: string,
     *     padding-top?: string,
     *     rel?: string,
     *     target?: string,
     *     text-decoration?: string,
     *     text-transform?: string
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
            '<mj-navbar-link%s>%s</mj-navbar-link>',
            $this->renderAttributes(),
            $this->content
        );
    }
}
