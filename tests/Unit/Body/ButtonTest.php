<?php

use Konanyhin\Envelope\Body\Button;

it('renders correctly', function (): void {
    $this->element = new Button('test');

    $this->rendersCorrectly('test');
});
