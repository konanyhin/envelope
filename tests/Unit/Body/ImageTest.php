<?php

use Konanyhin\Envelope\Body\Image;

it('renders correctly as short tag', function () {
    $this->element = new Image();

    $this->rendersCorrectlyAsShortTag();
});
