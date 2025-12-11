<?php

use Konanyhin\Envelope\Body\Raw;

it('renders correctly', function () {
    expect(new Raw('<p>test</p>')->render())->toBeString()->toBe('<mj-raw><p>test</p></mj-raw>');
});
