<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Body\Navbar\Link;
use Konanyhin\Envelope\Traits\Attributable;

class Navbar extends Element
{
    use Attributable;

    public const string TAG = 'mj-navbar';

    /**
     * @var Link[]
     */
    private array $links = [];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'base-url', 'hamburger', 'ico-align', 'ico-close', 'ico-color', 'ico-font-family', 'ico-font-size',
        'ico-line-height', 'ico-open', 'ico-padding', 'ico-padding-bottom', 'ico-padding-left', 'ico-padding-right',
        'ico-padding-top', 'ico-text-decoration', 'ico-text-transform',
    ];

    /**
     * @param array{
     *     align?: string,
     *     base-url?: string,
     *     hamburger?: string,
     *     ico-align?: string,
     *     ico-close?: string,
     *     ico-color?: string,
     *     ico-font-family?: string,
     *     ico-font-size?: string,
     *     ico-line-height?: string,
     *     ico-open?: string,
     *     ico-padding?: string,
     *     ico-padding-bottom?: string,
     *     ico-padding-left?: string,
     *     ico-padding-right?: string,
     *     ico-padding-top?: string,
     *     ico-text-decoration?: string,
     *     ico-text-transform?: string
     * } $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function addLink(Link $link): self
    {
        $this->links[] = $link;

        return $this;
    }

    public function render(): string
    {
        $links = implode('', array_map(fn (Link $link): string => $link->render(), $this->links));

        return sprintf(
            '<mj-navbar%s>%s</mj-navbar>',
            $this->renderAttributes(),
            $links
        );
    }
}
