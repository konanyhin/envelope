<?php

use Konanyhin\Envelope\Body\Navbar\Link;

it('renders correctly', function (): void {
    $this->element = new Link('test');

    $this->rendersCorrectly('test');
});
