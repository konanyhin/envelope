<?php

use Konanyhin\Envelope\Body\Accordion\Element;

beforeEach(function (): void {
    $this->element = new Element();

    $this->title = new Element\Title('Some title');
    $this->text = new Element\Text('Some text');
});

it('renders correctly', fn () => $this->rendersCorrectly());

it('renders correctly standalone title', function (): void {
    expect($this->title->render())->toBe('<mj-accordion-title>Some title</mj-accordion-title>');
});

it('renders correctly standalone text', function (): void {
    expect($this->text->render())->toBe('<mj-accordion-text>Some text</mj-accordion-text>');
});

it('renders correctly with its title', function (): void {
    $this->element->withTitle('Some title');

    expect($this->element->render())->toBe('<mj-accordion-element><mj-accordion-title>Some title</mj-accordion-title></mj-accordion-element>');
});

it('renders correctly with its text', function (): void {
    $this->element->withText('Some text');

    expect($this->element->render())->toBe('<mj-accordion-element><mj-accordion-text>Some text</mj-accordion-text></mj-accordion-element>');
});

afterEach(function (): void {
    unset($this->element, $this->title, $this->text);
});
