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
            return sprintf('<%s%s />', $tag, $attributes);
        }

        return sprintf('<%s%s>%s</%s>', $tag, $attributes, $content, $tag);
    }
}
