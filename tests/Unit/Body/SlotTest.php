<?php

use Konanyhin\Envelope\Body\Slot;

it('renders correctly', function () {
    expect(new Slot('test')->render())->toBeEmpty();
});
