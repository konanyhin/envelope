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
use Konanyhin\Envelope\Exceptions\SlotNotFoundException;
use Konanyhin\Envelope\Helpers\Body;

function createParentClass(array $attributes = []): object
{
    return new class($attributes) extends ParentElement {
        public const string TAG = 'mj-tag';

        /**
         * @var array<int, class-string<Element>>
         */
        protected array $allowedChildClasses = [
            Slot::class,
            Text::class,
            Group::class,
        ];

        /**
         * @var string[]
         */
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

        public function exposeReplaceChild(Element $old, Element $new): Element
        {
            return $this->replaceChild($old, $new);
        }
    };
}

it('throws exception for invalid attributes', function (): void {
    createParentClass(['invalid_key' => 'value']);
})->throws(InvalidAttributeException::class);

it('validates allowed attributes successfully', function (): void {
    createParentClass(['background-color' => 'white']);
})->throwsNoExceptions();

it('throws exception for invalid child method', function (): void {
    $instance = createParentClass();
    $instance->add(Body::column());
})->throws(InvalidChildElementException::class);

it('runs child method successfully', function (): void {
    $instance = createParentClass();
    $instance->add(Body::slot('test'));

    $children = $this->getProperty('children', $instance);

    expect($children[0])->toBeInstanceOf(Slot::class)
        ->and($children[0]->getName())->toBe('test');
});

it('replaces slot successfully', function (): void {
    $instance = createParentClass();
    $instance->add(Body::slot('test'));

    $element = $instance->replace('test', new Text('test'));

    expect($element)->toBeInstanceOf(Text::class)
        ->and($element->render())->toBe('<mj-text>test</mj-text>');
});

it('throws exception for wrong slot name', function (): void {
    $instance = createParentClass();
    $instance->add(Body::slot('test'));

    $instance->replace('invalid', new Text('test'));
})->throws(SlotNotFoundException::class);

it('throws exception for wrong slot name with children search', function (): void {
    $instance = createParentClass();
    $instance->add(Body::slot('test_1'));
    $instance->add(
        Body::group()->add(
            Body::slot('test_2')
        )
    );

    $instance->replace('invalid', new Text('test'));
})->throws(SlotNotFoundException::class);

it('throws exception for wrong child', function (): void {
    $instance = createParentClass();

    $instance->exposeReplaceChild(new Slot('test'), new Text('test'));
})->throws(ChildNotFoundException::class);

it('throws exception for wrong child element while replacing slot', function (): void {
    $instance = createParentClass();
    $instance->add(Body::slot('test'));

    $instance->replace('test', new Button('test'));
})->throws(InvalidChildElementException::class);

it('renders element with given attributes successfully', function (): void {
    $instance = createParentClass(['background-color' => 'white']);

    expect($instance->render())->toBe('<mj-tag background-color="white"></mj-tag>');
});

it('renders element with given attributes and children successfully', function (): void {
    $instance = createParentClass(['background-color' => 'white']);
    $instance->add(Body::text('test'));

    expect($instance->render())->toBe('<mj-tag background-color="white"><mj-text>test</mj-text></mj-tag>');
});
