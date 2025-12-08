<?php

use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Wrapper;

/**
 * mj-wrapper can contain:
 * - mj-raw
 * - mj-section
 */

beforeEach(function () {
    $this->element = new Wrapper();
});

it('has component :dataset', fn($class) => $this->parentMethodExists($class))->with([
    'Raw' => Raw::class,
    'Section' => Section::class,
]);

it('does not have component :dataset', fn($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Raw::class,
        Section::class,
    ])
);

afterEach(function () {
    unset($this->element);
});
