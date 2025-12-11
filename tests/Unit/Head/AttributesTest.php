<?php

use Konanyhin\Envelope\Body\Text;
use Konanyhin\Envelope\Head\Attributes;

beforeEach(function () {
    $this->element = new Attributes();
});

it('renders correctly', fn () => $this->rendersCorrectly());

it('adds child component successfully', function () {
    $this->element->add(Text::TAG, ['color' => 'red']);
    $this->element->addClass('class', ['color' => 'blue']);
    $this->element->addAll(['color' => 'green']);

    $children = $this->getChildren();

    expect($children[0])->toBeInstanceOf(Attributes\Element::class)
        ->and(trim($children[0]->render()))->toBe('<mj-text color="red" />')
        ->and($children[1])->toBeInstanceOf(Attributes\Element::class)
        ->and(trim($children[1]->render()))->toBe('<mj-class name="class" color="blue" />')
        ->and($children[2])->toBeInstanceOf(Attributes\Element::class)
        ->and(trim($children[2]->render()))->toBe('<mj-all color="green" />')
    ;
});

it('renders correctly with children', function () {
    $this->element->add(Text::TAG, ['color' => 'red']);

    expect(str_replace(["\n", "\r"], '', $this->element->render()))->toBe('<mj-attributes><mj-text color="red" /></mj-attributes>');
});

afterEach(function () {
    unset($this->element);
});
