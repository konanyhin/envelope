<?php

use Konanyhin\Envelope\Head\Title;

it('renders correctly', function () {
    $this->element = new Title('Some title');

    $this->rendersCorrectly('Some title');
});
