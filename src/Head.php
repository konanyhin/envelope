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
 * @method Attributes addAttributes()
 * @method Breakpoint addBreakpoint(BreakpointAttributes $attributes = [])
 * @method Font addFont(FontAttributes $attributes = [])
 * @method Preview addPreview(string $content)
 * @method Style addStyle(string $content, StyleAttributes $attributes = [])
 * @method Title addTitle(string $content)
 */
final class Head extends ParentElement
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
