<?php

use Konanyhin\Envelope\Body\Divider;

it('renders correctly as short tag', function () {
    $this->element = new Divider();

    $this->rendersCorrectlyAsShortTag();
});

