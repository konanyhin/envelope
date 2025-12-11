<?php

use Konanyhin\Envelope\Body\Table;

it('renders correctly', function () {
    $this->element = new Table('test');

    $this->rendersCorrectly('test');
});
