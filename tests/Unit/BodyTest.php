<?php

use Konanyhin\Envelope\Body;
use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Slot;
use Konanyhin\Envelope\Body\Wrapper;

/*
 * mj-body can contain:
 * - mj-raw
 * - mj-section
 * - mj-wrapper
 */

it('creates body from static factory method', function () {
    expect(Body::new())->toBeInstanceOf(Body::class);
});

beforeEach(function () {
    $this->element = new Body();
});

it('has component :dataset', fn ($class) => $this->parentMethodExists($class))->with([
    'Raw' => Raw::class,
    'Section' => Section::class,
    'Slot' => Slot::class,
    'Wrapper' => Wrapper::class,
]);

it('does not have component :dataset', fn ($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Raw::class,
        Section::class,
        Slot::class,
        Wrapper::class,
    ])
);

it('renders correctly', fn () => $this->rendersCorrectly());

afterEach(function () {
    unset($this->element);
});
