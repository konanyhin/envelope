<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Helpers;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Exceptions\InvalidStaticMethodException;
use Konanyhin\Envelope\Head\Attributes;
use Konanyhin\Envelope\Head\Breakpoint;
use Konanyhin\Envelope\Head\Font;
use Konanyhin\Envelope\Head\Preview;
use Konanyhin\Envelope\Head\Style;
use Konanyhin\Envelope\Head\Title;

/**
 * @method static Attributes attributes()
 * @method static Breakpoint breakpoint(array $attributes = [])
 * @method static Font       font(array $attributes = [])
 * @method static Preview    preview(string $content)
 * @method static Style      style(string $content, array $attributes = [])
 * @method static Title      title(string $content)
 */
class HeadComponent
{
    /**
     * @var array<string, class-string<Element>>
     */
    private static array $classMap = [
        'attributes' => Attributes::class,
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
        $name = strtolower($name);

        if (!isset(self::$classMap[$name])) {
            throw new InvalidStaticMethodException($name);
        }

        $class = self::$classMap[$name];

        return new $class(...$arguments);
    }
}
