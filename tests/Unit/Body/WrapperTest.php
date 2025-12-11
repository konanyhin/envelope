<?php

use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Slot;
use Konanyhin\Envelope\Body\Wrapper;

/*
 * mj-wrapper can contain:
 * - mj-raw
 * - mj-section
 */

beforeEach(function (): void {
    $this->element = new Wrapper();
});

it('has component :dataset', fn ($class) => $this->parentMethodExists($class))->with([
    'Raw' => Raw::class,
    'Section' => Section::class,
    'Slot' => Slot::class,
]);

it('does not have component :dataset', fn ($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Raw::class,
        Section::class,
        Slot::class,
    ])
);

it('renders correctly', fn () => $this->rendersCorrectly());

afterEach(function (): void {
    unset($this->element);
});
