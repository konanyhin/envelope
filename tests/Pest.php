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

pest()->extend(Tests\TestCase::class)
    ->in('Unit');

function getBodyComponents(array $except = []): array
{
    return array_filter([
        'Accordion' => Accordion::class,
        'Button' => Button::class,
        'Carousel' => Carousel::class,
        'Column' => Column::class,
        'Divider' => Divider::class,
        'Group' => Group::class,
        'Hero' => Hero::class,
        'Image' => Image::class,
        'Navbar' => Navbar::class,
        'Raw' => Raw::class,
        'Section' => Section::class,
        'Slot' => Slot::class,
        'Social' => Social::class,
        'Spacer' => Spacer::class,
        'Table' => Table::class,
        'Text' => Text::class,
        'Wrapper' => Wrapper::class,
    ], fn (string $class) => !in_array($class, $except));
}
