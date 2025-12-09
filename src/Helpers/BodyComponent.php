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
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type AccordionMainAttributes from Types
 * @phpstan-import-type ButtonAttributes from Types
 * @phpstan-import-type CarouselAttributes from Types
 * @phpstan-import-type ColumnAttributes from Types
 * @phpstan-import-type DividerAttributes from Types
 * @phpstan-import-type GroupAttributes from Types
 * @phpstan-import-type HeroAttributes from Types
 * @phpstan-import-type ImageAttributes from Types
 * @phpstan-import-type NavbarAttributes from Types
 * @phpstan-import-type SectionAttributes from Types
 * @phpstan-import-type SocialAttributes from Types
 * @phpstan-import-type SpacerAttributes from Types
 * @phpstan-import-type TableAttributes from Types
 * @phpstan-import-type TextAttributes from Types
 * @phpstan-import-type WrapperAttributes from Types
 *
 * @method static Accordion accordion(AccordionMainAttributes $attributes = [])
 * @method static Button button(string $text, ButtonAttributes $attributes = [])
 * @method static Carousel carousel(CarouselAttributes $attributes = [])
 * @method static Column column(ColumnAttributes $attributes = [])
 * @method static Divider divider(DividerAttributes $attributes = [])
 * @method static Group group(GroupAttributes $attributes = [])
 * @method static Hero hero(HeroAttributes $attributes = [])
 * @method static Image image(ImageAttributes $attributes = [])
 * @method static Navbar navbar(NavbarAttributes $attributes = [])
 * @method static Raw raw(string $content = '')
 * @method static Section section(SectionAttributes $attributes = [])
 * @method static Social social(SocialAttributes $attributes = [])
 * @method static Spacer spacer(SpacerAttributes $attributes = [])
 * @method static Table table(string $content, TableAttributes $attributes = [])
 * @method static Text text(string $text, TextAttributes $attributes = [])
 * @method static Wrapper wrapper(WrapperAttributes $attributes = [])
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
