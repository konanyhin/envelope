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
