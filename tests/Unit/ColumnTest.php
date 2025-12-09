<?php

use Konanyhin\Envelope\Body\Column;
use Konanyhin\Envelope\Body\Group;
use Konanyhin\Envelope\Body\Hero;
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Slot;
use Konanyhin\Envelope\Body\Wrapper;

/**
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

it('has component :dataset', fn ($class) => $this->parentMethodExists($class))->with(
    getBodyComponents([
        Column::class,
        Group::class,
        Hero::class,
        Section::class,
        Wrapper::class
    ])
);

it('does not have component :dataset', fn ($class) => $this->parentMethodNotExist($class))->with([
    'Column' => Column::class,
    'Group' => Group::class,
    'Hero' => Hero::class,
    'Section' => Section::class,
    'Wrapper' => Wrapper::class
]);

afterEach(function () {
    unset($this->element);
});
