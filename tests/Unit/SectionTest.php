<?php

use Konanyhin\Envelope\Body\Column;
use Konanyhin\Envelope\Body\Group;
use Konanyhin\Envelope\Body\Section;

/**
 * mj-section can contain only:
 * - mj-column
 * - mj-group (which itself contains mj-columns)
 */

beforeEach(function () {
    $this->element = new Section();
});

it('has component :dataset', fn($class) => $this->parentMethodExists($class))->with([
    'Column' => Column::class,
    'Group' => Group::class,
]);

it('does not have component :dataset', fn($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Column::class,
        Group::class,
    ])
);

afterEach(function () {
    unset($this->element);
});
