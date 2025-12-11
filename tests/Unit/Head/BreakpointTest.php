<?php

use Konanyhin\Envelope\Head\Breakpoint;

it('renders correctly as short tag', function (): void {
    $this->element = new Breakpoint();

    $this->rendersCorrectlyAsShortTag();
});
