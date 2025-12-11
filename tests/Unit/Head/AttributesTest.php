<?php

use Konanyhin\Envelope\Body\Text;
use Konanyhin\Envelope\Head\Attributes;

beforeEach(function (): void {
    $this->element = new Attributes();
});

it('renders correctly', fn () => $this->rendersCorrectly());

it('adds child component successfully', function (): void {
    $this->element->add(Text::TAG, ['color' => 'red']);
    $this->element->addClass('class', ['color' => 'blue']);
    $this->element->addAll(['color' => 'green']);

    $children = $this->getProperty('children');

    expect($children[0])->toBeInstanceOf(Attributes\Element::class)
        ->and(trim((string) $children[0]->render()))->toBe('<mj-text color="red" />')
        ->and($children[1])->toBeInstanceOf(Attributes\Element::class)
        ->and(trim((string) $children[1]->render()))->toBe('<mj-class name="class" color="blue" />')
        ->and($children[2])->toBeInstanceOf(Attributes\Element::class)
        ->and(trim((string) $children[2]->render()))->toBe('<mj-all color="green" />');
});

it('renders correctly with children', function (): void {
    $this->element->add(Text::TAG, ['color' => 'red']);

    expect(str_replace(["\n", "\r"], '', $this->element->render()))->toBe('<mj-attributes><mj-text color="red" /></mj-attributes>');
});

afterEach(function (): void {
    unset($this->element);
});
