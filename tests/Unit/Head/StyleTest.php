<?php

use Konanyhin\Envelope\Head\Style;

it('renders correctly', function () {
    $css = '.class { width: 150px; color: white; }';
    $this->element = new Style($css);

    $this->rendersCorrectly($css);
});
