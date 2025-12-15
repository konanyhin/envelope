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
 */
final class Head extends ParentElement
{
    public const string TAG = 'mj-head';

    /**
     * @var array<int, class-string<Element>>
     */
    protected array $allowedChildClasses = [
        Attributes::class,
        Breakpoint::class,
        Font::class,
        Preview::class,
        Style::class,
        Title::class,
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
