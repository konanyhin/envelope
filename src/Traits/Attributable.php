<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Traits;

trait Attributable
{
    protected array $attributes;

    protected function renderAttributes(): string
    {
        if (empty($this->attributes)) {
            return '';
        }

        $attributes = [];
        foreach ($this->attributes as $key => $value) {
            $attributes[] = sprintf('%s="%s"', $key, $value);
        }

        return ' '.implode(' ', $attributes);
    }

    protected function validateAttributes(array $allowedKeys): void
    {
        $invalidKeys = array_diff(array_keys($this->attributes), $allowedKeys);

        if ([] !== $invalidKeys) {
            throw new \InvalidArgumentException(
                sprintf('Invalid attribute(s) for %s: %s', static::class, implode(', ', $invalidKeys))
            );
        }
    }
}
