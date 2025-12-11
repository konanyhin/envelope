<?php

use Konanyhin\Envelope\Body\Spacer;

it('renders correctly as short tag', function () {
    $this->element = new Spacer();

    $this->rendersCorrectlyAsShortTag();
});
