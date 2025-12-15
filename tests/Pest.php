<?php

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
use Konanyhin\Envelope\Body\Slot;
use Konanyhin\Envelope\Body\Social;
use Konanyhin\Envelope\Body\Spacer;
use Konanyhin\Envelope\Body\Table;
use Konanyhin\Envelope\Body\Text;
use Konanyhin\Envelope\Body\Wrapper;
use Konanyhin\Envelope\Head\Attributes;
use Konanyhin\Envelope\Head\Breakpoint;
use Konanyhin\Envelope\Head\Font;
use Konanyhin\Envelope\Head\Preview;
use Konanyhin\Envelope\Head\Style;
use Konanyhin\Envelope\Head\Title;
use Tests\ElementTestCase;

pest()->extend(ElementTestCase::class)
    ->in('Unit');

function getHeadComponents(array $except = []): array
{
    return array_filter([
        'Attributes' => Attributes::class,
        'Element' => Attributes\Element::class,
        'Breakpoint' => Breakpoint::class,
        'Font' => Font::class,
        'Preview' => Preview::class,
        'Style' => Style::class,
        'Title' => Title::class,
    ], fn (string $class): bool => !in_array($class, $except));
}

function getBodyComponents(array $except = []): array
{
    return array_filter([
        'Accordion' => Accordion::class,
        'AccordionElement' => Accordion\Element::class,
        'Button' => Button::class,
        'Carousel' => Carousel::class,
        'CarouselImage' => Carousel\Image::class,
        'Column' => Column::class,
        'Divider' => Divider::class,
        'Group' => Group::class,
        'Hero' => Hero::class,
        'Image' => Image::class,
        'Navbar' => Navbar::class,
        'NavbarLink' => Navbar\Link::class,
        'Raw' => Raw::class,
        'Section' => Section::class,
        'Slot' => Slot::class,
        'Social' => Social::class,
        'SocialElement' => Social\Element::class,
        'Spacer' => Spacer::class,
        'Table' => Table::class,
        'Text' => Text::class,
        'Wrapper' => Wrapper::class,
    ], fn (string $class): bool => !in_array($class, $except));
}
