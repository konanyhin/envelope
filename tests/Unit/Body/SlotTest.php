<?php

use Konanyhin\Envelope\Body\Slot;

it('renders correctly', function (): void {
    expect(new Slot('test')->render())->toBeEmpty();
});
