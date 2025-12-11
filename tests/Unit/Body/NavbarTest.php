<?php

use Konanyhin\Envelope\Body\Navbar;

/**
 * mj-navbar can contain:
 * - mj-navbar-link
 */

beforeEach(function () {
    $this->element = new Navbar();
});

it('has component :dataset', fn ($class) => $this->parentMethodExists($class))->with([
    'NavbarLink' => Navbar\Link::class,
]);

it('does not have component :dataset', fn ($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Navbar\Link::class,
    ])
);

it('renders correctly', fn () => $this->rendersCorrectly());

afterEach(function () {
    unset($this->element);
});
