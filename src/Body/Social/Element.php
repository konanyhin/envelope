<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Body\Social;

use Konanyhin\Envelope\Abstracts\Element as BaseElement;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type SocialElementAttributes from Types
 */
final class Element extends BaseElement
{
    use Attributable;

    public const string TAG = 'mj-social-element';

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
     * @param SocialElementAttributes $attributes
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
