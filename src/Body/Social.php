<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Body\Social\Element as SocialElement;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type SocialAttributes from Types
 * @phpstan-import-type SocialElementAttributes from Types
 *
 * @method SocialElement addSocialElement(string $content = '', SocialElementAttributes $attributes = [])
 */
class Social extends ParentElement
{
    use Attributable;

    public const string TAG = 'mj-social';

    /**
     * @var array<string, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        'addSocialElement' => SocialElement::class,
    ];

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'align', 'border-radius', 'color', 'container-background-color', 'font-family', 'font-size', 'font-style',
        'font-weight', 'icon-height', 'icon-size', 'inner-padding', 'line-height', 'mode', 'padding',
        'padding-bottom', 'padding-left', 'padding-right', 'padding-top', 'table-layout', 'text-decoration',
    ];

    /**
     * @param SocialAttributes $attributes
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
