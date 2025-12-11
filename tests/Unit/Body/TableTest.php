<?php

use Konanyhin\Envelope\Body\Table;

it('renders correctly', function (): void {
    $this->element = new Table('test');

    $this->rendersCorrectly('test');
});
