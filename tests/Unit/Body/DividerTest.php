<?php

use Konanyhin\Envelope\Body\Divider;

it('renders correctly as short tag', function (): void {
    $this->element = new Divider();

    $this->rendersCorrectlyAsShortTag();
});
