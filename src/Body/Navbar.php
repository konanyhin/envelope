<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Body\Navbar\Link;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type NavbarAttributes from Types
 * @phpstan-import-type NavbarLinkAttributes from Types
 *
 * @method Link addNavbarLink(string $content, NavbarLinkAttributes $attributes = [])
 */
class Navbar extends ParentElement
{
    use Attributable;

    public const string TAG = 'mj-navbar';

    /**
     * @var array<string, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        'addNavbarLink' => Link::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'base-url', 'hamburger', 'ico-align', 'ico-close', 'ico-color', 'ico-font-family', 'ico-font-size',
        'ico-line-height', 'ico-open', 'ico-padding', 'ico-padding-bottom', 'ico-padding-left', 'ico-padding-right',
        'ico-padding-top', 'ico-text-decoration', 'ico-text-transform',
    ];

    /**
     * @param NavbarAttributes $attributes
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
