<?php

use Konanyhin\Envelope\Body;
use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Slot;
use Konanyhin\Envelope\Body\Wrapper;
use Konanyhin\Envelope\Head;
use Konanyhin\Envelope\Head\Attributes;
use Konanyhin\Envelope\Head\Breakpoint;
use Konanyhin\Envelope\Head\Font;
use Konanyhin\Envelope\Head\Preview;
use Konanyhin\Envelope\Head\Style;
use Konanyhin\Envelope\Head\Title;

/**
 * mj-head can contain:
 * - mj-attributes
 * - mj-breakpoint
 * - mj-font
 * - mj-preview
 * - mj-style
 * - mj-title
 */

it('creates head from static factory method', function () {
    expect(Head::new())->toBeInstanceOf(Head::class);
});

beforeEach(function () {
    $this->element = new Head();
});

it('has component :dataset', fn ($class) => $this->parentMethodExists($class))->with([
    'Attributes' => Attributes::class,
    'Breakpoint' => Breakpoint::class,
    'Font' => Font::class,
    'Preview' => Preview::class,
    'Style' => Style::class,
    'Title' => Title::class,
]);

it('does not have component :dataset', fn ($class) => $this->parentMethodNotExist($class))->with(
    getHeadComponents([
        Attributes::class,
        Breakpoint::class,
        Font::class,
        Preview::class,
        Style::class,
        Title::class,
    ])
);

it('renders correctly', fn () => $this->rendersCorrectly());

afterEach(function () {
    unset($this->element);
});
