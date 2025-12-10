<?php

declare(strict_types=1);

namespace Konanyhin\Envelope;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Head\Attributes;
use Konanyhin\Envelope\Head\Breakpoint;
use Konanyhin\Envelope\Head\Font;
use Konanyhin\Envelope\Head\Preview;
use Konanyhin\Envelope\Head\Style;
use Konanyhin\Envelope\Head\Title;

/**
 * @phpstan-import-type BreakpointAttributes from Types
 * @phpstan-import-type FontAttributes from Types
 * @phpstan-import-type StyleAttributes from Types
 *
 * @method self addAttributes()
 * @method self addBreakpoint(BreakpointAttributes $attributes = [])
 * @method self addFont(FontAttributes $attributes = [])
 * @method self addPreview(string $content)
 * @method self addStyle(string $content, StyleAttributes $attributes = [])
 * @method self addTitle(string $content)
 */
class Head extends ParentElement
{
    public const string TAG = 'mj-head';

    /**
     * @var array<string, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        'addAttributes' => Attributes::class,
        'addBreakpoint' => Breakpoint::class,
        'addFont' => Font::class,
        'addPreview' => Preview::class,
        'addStyle' => Style::class,
        'addTitle' => Title::class,
    ];

    public static function new(): self
    {
        return new self();
    }

    public function render(): string
    {
        return $this->renderTag($this->renderChildren());
    }
}
