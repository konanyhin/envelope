<?php

use Konanyhin\Envelope\Body\Button;

it('renders correctly', function () {
    $this->element = new Button('test');

    $this->rendersCorrectly('test');
});
