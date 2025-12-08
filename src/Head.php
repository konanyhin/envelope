<?php

declare(strict_types=1);

namespace Konanyhin\Envelope;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Head\Attributes;
use Konanyhin\Envelope\Head\Breakpoint;
use Konanyhin\Envelope\Head\Font;
use Konanyhin\Envelope\Head\Preview;
use Konanyhin\Envelope\Head\Style;
use Konanyhin\Envelope\Head\Title;

class Head extends Element
{
    private ?Breakpoint $breakpoint = null;

    private ?Title $title = null;

    private ?Preview $preview = null;

    /** @var Attributes[] */
    private array $attributesElements = [];

    /** @var Font[] */
    private array $fontElements = [];

    /** @var Style[] */
    private array $styleElements = [];

    public static function new(): self
    {
        return new self();
    }

    public function addAttributes(Attributes $attributes): self
    {
        $this->attributesElements[] = $attributes;

        return $this;
    }

    public function addBreakpoint(Breakpoint $breakpoint): self
    {
        $this->breakpoint = $breakpoint;

        return $this;
    }

    public function addFont(Font $font): self
    {
        $this->fontElements[] = $font;

        return $this;
    }

    public function addPreview(Preview $preview): self
    {
        $this->preview = $preview;

        return $this;
    }

    public function addStyle(Style $style): self
    {
        $this->styleElements[] = $style;

        return $this;
    }

    public function addTitle(Title $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function render(): string
    {
        $allChildren = array_merge(
            array_filter([$this->breakpoint, $this->title, $this->preview]),
            $this->attributesElements,
            $this->fontElements,
            $this->styleElements
        );

        $childrenContent = implode('', array_map(fn (Element $child): string => $child->render(), $allChildren));

        return sprintf(
            '<mj-head>%s</mj-head>',
            $childrenContent
        );
    }
}
