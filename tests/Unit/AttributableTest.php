<?php

use Konanyhin\Envelope\Exceptions\InvalidAttributeException;
use Konanyhin\Envelope\Traits\Attributable;

function createAttributableClass(array $attributes): object
{
    return new class($attributes) {
        use Attributable;

        public function __construct(array $attributes)
        {
            $this->setAttributes($attributes);
        }

        public function render(): string
        {
            return $this->renderAttributes();
        }

        public function validate(array $allowedKeys): void
        {
            $this->validateAttributes($allowedKeys);
        }
    };
}

it('sets attributes correctly', function (): void {
    $instance = createAttributableClass(['key1' => 'value1', 'key2' => 'value2']);
    $attributes = $this->getProperty('attributes', $instance);

    expect($attributes['key1'])->toBe('value1')
        ->and($attributes['key2'])->toBe('value2');
});

it('adds attributes successfully', function (): void {
    $instance = createAttributableClass(['key1' => 'value1']);
    $instance->addAttributes(['key1' => 'value2', 'key2' => 'value2']);

    $attributes = $this->getProperty('attributes', $instance);
    expect($attributes['key1'])->toBe('value2')
        ->and($attributes['key2'])->toBe('value2');
});

it('removes attributes successfully', function (): void {
    $instance = createAttributableClass(['key1' => 'value1', 'key2' => 'value2', 'key3' => 'value3']);
    $instance->removeAttributes(['key1']);

    $attributes = $this->getProperty('attributes', $instance);

    expect($attributes['key1'])->toBeEmpty()
        ->and($attributes['key2'])->toBe('value2')
        ->and($attributes['key3'])->toBe('value3');

    $instance->removeAttributes();
    $attributes = $this->getProperty('attributes', $instance);
    expect($attributes)->toBeEmpty();
});

it('renders attributes correctly', function (): void {
    $instance = createAttributableClass(['key1' => 'value1', 'key2' => 'value2']);
    expect($instance->render())->toBe(' key1="value1" key2="value2"');
});

it('renders empty attributes as empty string', function (): void {
    $instance = createAttributableClass([]);
    expect($instance->render())->toBe('');
});

it('validates allowed attributes successfully', function (): void {
    $instance = createAttributableClass(['key1' => 'value1']);

    $instance->validate(['key1', 'key2']);
})->throwsNoExceptions();

it('throws exception for invalid attributes', function (): void {
    $instance = createAttributableClass(['invalid_key' => 'value']);

    $instance->validate(['key1', 'key2']);
})->throws(InvalidAttributeException::class);
