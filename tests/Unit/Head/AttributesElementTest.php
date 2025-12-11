<?php

use Konanyhin\Envelope\Exceptions\InvalidMjmlTagException;
use Konanyhin\Envelope\Head\Attributes\Element;

it('throws exception on invalid tag', function () {
    new Element('mj-test');
})->throws(InvalidMjmlTagException::class);

it('renders correctly', function () {
    $element = new Element('mj-text', ['color' => 'red']);

    expect(trim($element->render()))->toBe('<mj-text color="red" />');
});
