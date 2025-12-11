<?php

use Konanyhin\Envelope\Body\Carousel;

/*
 * mj-carousel can contain:
 * - mj-carousel-image
 */

beforeEach(function () {
    $this->element = new Carousel();
});

it('has component :dataset', fn ($class) => $this->parentMethodExists($class))->with([
    'CarouselImage' => Carousel\Image::class,
]);

it('does not have component :dataset', fn ($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Carousel\Image::class,
    ])
);

it('renders correctly', fn () => $this->rendersCorrectly());

afterEach(function () {
    unset($this->element);
});
