<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Helpers;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Body\Accordion;
use Konanyhin\Envelope\Body\Button;
use Konanyhin\Envelope\Body\Carousel;
use Konanyhin\Envelope\Body\Column;
use Konanyhin\Envelope\Body\Divider;
use Konanyhin\Envelope\Body\Group;
use Konanyhin\Envelope\Body\Hero;
use Konanyhin\Envelope\Body\Image;
use Konanyhin\Envelope\Body\Navbar;
use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Social;
use Konanyhin\Envelope\Body\Spacer;
use Konanyhin\Envelope\Body\Table;
use Konanyhin\Envelope\Body\Text;
use Konanyhin\Envelope\Body\Wrapper;
use Konanyhin\Envelope\Exceptions\InvalidStaticMethodException;

/**
 * @method static Accordion accordion(array $attributes = [])
 * @method static Button button(string $text, array $attributes = [])
 * @method static Carousel carousel(array $attributes = [])
 * @method static Column column(array $attributes = [])
 * @method static Divider divider(array $attributes = [])
 * @method static Group group(array $attributes = [])
 * @method static Hero hero(array $attributes = [])
 * @method static Image image(array $attributes = [])
 * @method static Navbar navbar(array $attributes = [])
 * @method static Raw raw(string $content = '')
 * @method static Section section(array $attributes = [])
 * @method static Social social(array $attributes = [])
 * @method static Spacer spacer(array $attributes = [])
 * @method static Table table(string $content, array $attributes = [])
 * @method static Text text(string $text, array $attributes = [])
 * @method static Wrapper wrapper(array $attributes = [])
 */
class BodyComponent
{
    /**
     * @var array<string, class-string<Element>>
     */
    private static array $classMap = [
        'accordion' => Accordion::class,
        'button' => Button::class,
        'carousel' => Carousel::class,
        'column' => Column::class,
        'divider' => Divider::class,
        'group' => Group::class,
        'hero' => Hero::class,
        'image' => Image::class,
        'navbar' => Navbar::class,
        'raw' => Raw::class,
        'section' => Section::class,
        'social' => Social::class,
        'spacer' => Spacer::class,
        'table' => Table::class,
        'text' => Text::class,
        'wrapper' => Wrapper::class,
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
