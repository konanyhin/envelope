<?php

use Konanyhin\Envelope\Body\Social;

/*
 * mj-social can contain:
 * - mj-social-element
 */

beforeEach(function (): void {
    $this->element = new Social();
});

it('has component :dataset', fn ($class) => $this->parentMethodExists($class))->with([
    'SocialElement' => Social\Element::class,
]);

it('does not have component :dataset', fn ($class) => $this->parentMethodNotExist($class))->with(
    getBodyComponents([
        Social\Element::class,
    ])
);

it('renders correctly', fn () => $this->rendersCorrectly());

afterEach(function (): void {
    unset($this->element);
});
