<?php

use Konanyhin\Envelope\Head\Font;

it('renders correctly as short tag', function (): void {
    $this->element = new Font();

    $this->rendersCorrectlyAsShortTag();
});
