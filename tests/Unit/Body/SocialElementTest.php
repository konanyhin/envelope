<?php

use Konanyhin\Envelope\Body\Social\Element;

it('renders correctly', function () {
    $this->element = new Element('test');

    $this->rendersCorrectly('test');
});
