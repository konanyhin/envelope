<?php

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Abstracts\ParentElement;
use Konanyhin\Envelope\Body\Button;
use Konanyhin\Envelope\Body\Group;
use Konanyhin\Envelope\Body\Slot;
use Konanyhin\Envelope\Body\Text;
use Konanyhin\Envelope\Exceptions\ChildNotFoundException;
use Konanyhin\Envelope\Exceptions\InvalidAttributeException;
use Konanyhin\Envelope\Exceptions\InvalidChildElementException;
use Konanyhin\Envelope\Exceptions\InvalidMethodException;
use Konanyhin\Envelope\Exceptions\SlotNotFoundException;

function createParentClass(array $attributes = []): object
{
    return new class($attributes) extends ParentElement {
        public const string TAG = 'mj-tag';

        protected array $allowedChildClasses = [
            'addSlot' => Slot::class,
            'addText' => Text::class,
            'addGroup' => Group::class,
        ];

        private array $allowedAttributes = [
            'background-color', 'border', 'width',
        ];

        public function __construct(array $attributes)
        {
            parent::__construct($attributes);
            $this->validateAttributes($this->allowedAttributes);
        }

        public function render(): string
        {
            return $this->renderTag($this->renderChildren());
        }

        public function exposeReplaceChild(Element $old, Element $new)
        {
            return $this->replaceChild($old, $new);
        }
    };
}

it('throws exception for invalid attributes', function () {
    createParentClass(['invalid_key' => 'value']);
})->throws(InvalidAttributeException::class);

it('validates allowed attributes successfully', function () {
    createParentClass(['background-color' => 'white']);
})->throwsNoExceptions();

it('throws exception for invalid child method', function () {
    $instance = createParentClass();

    $instance->addColumn();
})->throws(InvalidMethodException::class);

it('runs child method successfully', function () {
    $instance = createParentClass();
    $instance->addSlot('test');

    $children = new ReflectionClass($instance)->getProperty('children')->getValue($instance);

    expect($children[0])->toBeInstanceOf(Slot::class)
        ->and($children[0]->getName())->toBe('test')
    ;
});

it('replaces slot successfully', function () {
    $instance = createParentClass();
    $instance->addSlot('test');

    $element = $instance->replace('test', new Text('test'));

    expect($element)->toBeInstanceOf(Text::class)
        ->and($element->render())->toBe('<mj-text>test</mj-text>')
    ;
});

it('throws exception for wrong slot name', function () {
    $instance = createParentClass();
    $instance->addSlot('test');

    $instance->replace('invalid', new Text('test'));
})->throws(SlotNotFoundException::class);

it('throws exception for wrong slot name with children search', function () {
    $instance = createParentClass();
    $instance->addSlot('test_1');
    $instance->addGroup()->addSlot('test_2');

    $instance->replace('invalid', new Text('test'));
})->throws(SlotNotFoundException::class);

it('throws exception for wrong child', function () {
    $instance = createParentClass();

    $instance->exposeReplaceChild(new Slot('test'), new Text('test'));
})->throws(ChildNotFoundException::class);

it('throws exception for wrong child element while replacing slot', function () {
    $instance = createParentClass();
    $instance->addSlot('test');

    $instance->replace('test', new Button('test'));
})->throws(InvalidChildElementException::class);

it('renders element with given attributes successfully', function () {
    $instance = createParentClass(['background-color' => 'white']);

    expect($instance->render())->toBe('<mj-tag background-color="white"></mj-tag>');
});

it('renders element with given attributes and children successfully', function () {
    $instance = createParentClass(['background-color' => 'white']);
    $instance->addText('test');

    expect($instance->render())->toBe('<mj-tag background-color="white"><mj-text>test</mj-text></mj-tag>');
});
