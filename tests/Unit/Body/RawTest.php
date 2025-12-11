<?php

use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Slot;

it('renders correctly', function () {
    $html = '<p>test</p>';
    expect(new Raw($html)->render())->toBeString($html);
});
