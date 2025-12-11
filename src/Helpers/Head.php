<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Helpers;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Exceptions\InvalidStaticMethodException;
use Konanyhin\Envelope\Head\Attributes;
use Konanyhin\Envelope\Head\Attributes\Element as AttributesElement;
use Konanyhin\Envelope\Head\Breakpoint;
use Konanyhin\Envelope\Head\Font;
use Konanyhin\Envelope\Head\Preview;
use Konanyhin\Envelope\Head\Style;
use Konanyhin\Envelope\Head\Title;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type BreakpointAttributes from Types
 * @phpstan-import-type FontAttributes from Types
 * @phpstan-import-type StyleAttributes from Types
 * @phpstan-import-type HeadAttributesElementAttributes from Types
 *
 * @method static Attributes attributes()
 * @method static AttributesElement attributesElement(string $tagName, HeadAttributesElementAttributes $attributes = [])
 * @method static Breakpoint breakpoint(BreakpointAttributes $attributes = [])
 * @method static Font font(FontAttributes $attributes = [])
 * @method static Preview preview(string $content)
 * @method static Style style(string $content, StyleAttributes $attributes = [])
 * @method static Title title(string $content)
 */
class Head
{
    /**
     * @var array<string, class-string<Element>>
     */
    private static array $classMap = [
        'attributes' => Attributes::class,
        'attributesElement' => AttributesElement::class,
        'breakpoint' => Breakpoint::class,
        'font' => Font::class,
        'preview' => Preview::class,
        'style' => Style::class,
        'title' => Title::class,
    ];

    /**
     * @param array<mixed> $arguments
     */
    public static function __callStatic(string $name, array $arguments): Element
    {
        if (!isset(self::$classMap[$name])) {
            throw new InvalidStaticMethodException($name);
        }

        $class = self::$classMap[$name];

        return new $class(...$arguments);
    }
}
