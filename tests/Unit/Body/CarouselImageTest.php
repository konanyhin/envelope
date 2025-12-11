<?php

use Konanyhin\Envelope\Body\Carousel\Image;

it('renders correctly as short tag', function () {
    $this->element = new Image();

    $this->rendersCorrectlyAsShortTag();
});
