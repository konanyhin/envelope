<?php

use Konanyhin\Envelope\Abstracts\Element;

function createElementClass(): object
{
    return new class extends Element {
        public const string TAG = 'mj-tag';

        public function render(): string
        {
            return sprintf('<%1$s>%2$s</%s1>', self::TAG, 'test');
        }

        public function renderEmpty(): string
        {
            return $this->renderTag();
        }
    };
}

it('renders tag correctly', function () {
    $element = createElementClass();
    $result = '<mj-tag>test</mj-tag>';

    expect($element->render())->toBeString($result)
        ->and((string)$element)->toBeString($result);
});

it('renders tag correctly with empty content', function () {
    $element = createElementClass();

    expect($element->renderEmpty())->toBeString('<mj-tag />');
});
