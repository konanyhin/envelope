<?php

use Konanyhin\Envelope\Body\Accordion;

/**
 * mj-accordion can contain:
 * - mj-accordion-element
 */

beforeEach(function () {
    $this->element = new Accordion();
});

it('has component :dataset', fn ($class) => $this->parentMethodExists($class))->with([
    'AccordionElement' => Accordion\Element::class,
]);

it('does not have component :dataset', fn ($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Accordion\Element::class,
    ])
);

it('renders correctly', fn () => $this->rendersCorrectly());

afterEach(function () {
    unset($this->element);
});
