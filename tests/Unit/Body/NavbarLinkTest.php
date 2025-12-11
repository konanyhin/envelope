<?php

use Konanyhin\Envelope\Body\Navbar\Link;

it('renders correctly', function () {
    $this->element = new Link('test');

    $this->rendersCorrectly('test');
});
