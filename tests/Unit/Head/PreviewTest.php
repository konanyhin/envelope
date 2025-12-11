<?php

use Konanyhin\Envelope\Head\Preview;

it('renders correctly', function (): void {
    $this->element = new Preview('Some preview text');

    $this->rendersCorrectly('Some preview text');
});
