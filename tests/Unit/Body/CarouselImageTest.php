<?php

use Konanyhin\Envelope\Body\Carousel\Image;

it('renders correctly as short tag', function (): void {
    $this->element = new Image();

    $this->rendersCorrectlyAsShortTag();
});
