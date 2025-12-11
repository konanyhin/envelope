<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body\Navbar;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type NavbarLinkAttributes from Types
 */
class Link extends Element
{
    use Attributable;

    public const string TAG = 'mj-navbar-link';

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
     * @param NavbarLinkAttributes $attributes
     */
    public function __construct(string $content, array $attributes = [])
    {
        $this->content = $content;
        $this->setAttributes($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return $this->renderTag($this->content);
    }
}
