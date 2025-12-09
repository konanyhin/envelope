<?php

use Konanyhin\Envelope\Body\Column;
use Konanyhin\Envelope\Body\Group;
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Slot;

/**
 * mj-section can contain only:
 * - mj-column
 * - mj-group (which itself contains mj-columns)
 */

beforeEach(function () {
    $this->element = new Section();
});

it('has component :dataset', fn ($class) => $this->parentMethodExists($class))->with([
    'Column' => Column::class,
    'Group' => Group::class,
    'Slot' => Slot::class,
]);

it('does not have component :dataset', fn ($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Column::class,
        Group::class,
        Slot::class
    ])
);

afterEach(function () {
    unset($this->element);
});
