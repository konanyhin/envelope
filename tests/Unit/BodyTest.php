<?php

use Konanyhin\Envelope\Body;
use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Wrapper;

/**
 * mj-body can contain:
 * - mj-raw
 * - mj-section
 * - mj-wrapper
 */

beforeEach(function () {
    $this->element = new Body();
});

it('has component :dataset', fn($class) => $this->parentMethodExists($class))->with([
    'Raw' => Raw::class,
    'Section' => Section::class,
    'Wrapper' => Wrapper::class
]);

it('does not have component :dataset', fn($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Raw::class,
        Section::class,
        Wrapper::class
    ])
);

afterEach(function () {
    unset($this->element);
});
