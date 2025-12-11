<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Abstracts;

abstract class Element implements \Stringable
{
    public const string TAG = '';

    public function __toString(): string
    {
        return $this->render();
    }

    abstract public function render(): string;

    protected function renderAttributes(): string
    {
        return '';
    }

    protected function renderTag(?string $content = null): string
    {
        $tag = constant('static::TAG');
        $attributes = $this->renderAttributes();

        if (null === $content) {
            return sprintf('<%1$s%2$s />', $tag, $attributes);
        }

        return sprintf('<%1$s%2$s>%3$s</%1$s>', $tag, $attributes, $content);
    }
}
