<?php

use Konanyhin\Envelope\Head\Font;

it('renders correctly as short tag', function () {
    $this->element = new Font();

    $this->rendersCorrectlyAsShortTag();
});
