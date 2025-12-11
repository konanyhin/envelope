<?php

use Konanyhin\Envelope\Abstracts\Element;

function createElementClass(): object
{
    return new class extends Element {
        public const string TAG = 'mj-tag';

        public function render(): string
        {
            return sprintf('<%1$s>%2$s</%1$s>', self::TAG, 'test');
        }

        public function renderEmpty(): string
        {
            return $this->renderTag();
        }
    };
}

it('renders tag correctly', function (): void {
    $element = createElementClass();
    $result = '<mj-tag>test</mj-tag>';

    expect($element->render())->toBeString()->toBe($result)
        ->and((string) $element)->toBeString()->toBe($result)
    ;
});

it('renders tag correctly with empty content', function (): void {
    $element = createElementClass();

    expect($element->renderEmpty())->toBeString()->toBe('<mj-tag />');
});
