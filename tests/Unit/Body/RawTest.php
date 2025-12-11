<?php

use Konanyhin\Envelope\Body\Raw;

it('renders correctly', function (): void {
    expect((new Raw('<p>test</p>'))->render())->toBeString()->toBe('<mj-raw><p>test</p></mj-raw>');
});
