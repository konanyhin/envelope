<?php

use Konanyhin\Envelope\Body\Social\Element;

it('renders correctly', function (): void {
    $this->element = new Element('test');

    $this->rendersCorrectly('test');
});
