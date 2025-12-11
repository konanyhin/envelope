<?php

use Konanyhin\Envelope\Body\Accordion;
use Konanyhin\Envelope\Body\Button;
use Konanyhin\Envelope\Body\Carousel;
use Konanyhin\Envelope\Body\Column;
use Konanyhin\Envelope\Body\Divider;
use Konanyhin\Envelope\Body\Image;
use Konanyhin\Envelope\Body\Navbar;
use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Slot;
use Konanyhin\Envelope\Body\Social;
use Konanyhin\Envelope\Body\Spacer;
use Konanyhin\Envelope\Body\Table;
use Konanyhin\Envelope\Body\Text;

/*
 * mj-column can contain:
 * - mj-accordion
 * - mj-button
 * - mj-carousel
 * - mj-divider
 * - mj-image
 * - mj-navbar
 * - mj-raw
 * - mj-social
 * - mj-spacer
 * - mj-table
 * - mj-text
 */

beforeEach(function () {
    $this->element = new Column();
});

it('has component :dataset', fn ($class) => $this->parentMethodExists($class))->with([
    'Accordion' => Accordion::class,
    'Button' => Button::class,
    'Carousel' => Carousel::class,
    'Divider' => Divider::class,
    'Image' => Image::class,
    'Navbar' => Navbar::class,
    'Raw' => Raw::class,
    'Social' => Social::class,
    'Spacer' => Spacer::class,
    'Table' => Table::class,
    'Text' => Text::class,
    'Slot' => Slot::class,
]);

it('does not have component :dataset', fn ($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Accordion::class,
        Button::class,
        Carousel::class,
        Divider::class,
        Image::class,
        Navbar::class,
        Raw::class,
        Social::class,
        Spacer::class,
        Table::class,
        Text::class,
        Slot::class,
    ])
);

it('renders correctly', fn () => $this->rendersCorrectly());

afterEach(function () {
    unset($this->element);
});
