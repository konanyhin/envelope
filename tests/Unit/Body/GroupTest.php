<?php

use Konanyhin\Envelope\Body\Column;
use Konanyhin\Envelope\Body\Group;
use Konanyhin\Envelope\Body\Slot;

/*
 * mj-group can contain:
 * - mj-column
 */

beforeEach(function (): void {
    $this->element = new Group();
});

it('has component :dataset', fn ($class) => $this->parentMethodExists($class))->with([
    'Column' => Column::class,
    'Slot' => Slot::class,
]);

it('does not have component :dataset', fn ($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Column::class,
        Slot::class,
    ])
);

it('renders correctly', fn () => $this->rendersCorrectly());

afterEach(function (): void {
    unset($this->element);
});
