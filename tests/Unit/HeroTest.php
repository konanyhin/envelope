<?php

use Konanyhin\Envelope\Body\Button;
use Konanyhin\Envelope\Body\Hero;
use Konanyhin\Envelope\Body\Image;
use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Slot;
use Konanyhin\Envelope\Body\Text;

/**
 * mj-hero can contain:
 * - mj-button
 * - mj-image
 * - mj-raw
 * - mj-text
 */

beforeEach(function () {
    $this->element = new Hero();
});

it('has component :dataset', fn ($class) => $this->parentMethodExists($class))->with([
    'Button' => Button::class,
    'Image' => Image::class,
    'Raw' => Raw::class,
    'Slot' => Slot::class,
    'Text' => Text::class,
]);

it('does not have component :dataset', fn ($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Button::class,
        Image::class,
        Raw::class,
        Slot::class,
        Text::class,
    ])
);

afterEach(function () {
    unset($this->element);
});
