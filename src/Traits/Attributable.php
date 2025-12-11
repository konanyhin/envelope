<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Traits;

use Konanyhin\Envelope\Exceptions\InvalidAttributeException;

trait Attributable
{
    /**
     * @var array<string, string>
     */
    protected array $attributes;

    public function setAttributes(array $attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function addAttributes(array $attributes): self
    {
        $this->validateAttributes($attributes);

        $this->attributes = array_merge($this->attributes, $attributes);

        return $this;
    }

    public function removeAttributes(array $attributes = []): self
    {
        if ([] === $attributes) {
            $this->attributes = [];
        } else {
            $this->validateAttributes($attributes);

            $this->attributes = array_diff_key($this->attributes, array_fill_keys($attributes, ''));
        }

        return $this;
    }

    protected function renderAttributes(): string
    {
        if ([] === $this->attributes) {
            return '';
        }

        $attributes = [];
        foreach ($this->attributes as $key => $value) {
            $attributes[] = sprintf('%s="%s"', $key, $value);
        }

        return ' ' . implode(' ', $attributes);
    }

    /**
     * @param array<string> $allowedKeys
     */
    protected function validateAttributes(array $allowedKeys): void
    {
        $invalidKeys = array_diff(array_keys($this->attributes), $allowedKeys);

        if ([] !== $invalidKeys) {
            throw new InvalidAttributeException(static::class, $invalidKeys);
        }
    }
}
