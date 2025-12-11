<?php

namespace Tests;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Exceptions\InvalidMethodException;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public Element $element;

    public function parentMethodExists(string $namespace): void
    {
        expect(fn () => $this->element->{'add' . $this->getClassName($namespace)}())
            ->not
            ->toThrow(InvalidMethodException::class)
        ;
    }

    public function parentMethodNotExist(string $namespace): void
    {
        expect(fn () => $this->element->{'add' . $this->getClassName($namespace)}())
            ->toThrow(InvalidMethodException::class)
        ;
    }

    public function rendersCorrectly(?string $content = ''): void
    {
        expect($this->element->render())->toBeString()->toBe(sprintf('<%1$s>%2$s</%1$s>', get_class($this->element)::TAG, $content));
    }

    public function rendersCorrectlyAsShortTag(): void
    {
        expect($this->element->render())->toBeString()->toBe(sprintf('<%s />', get_class($this->element)::TAG));
    }

    public function getChildren()
    {
        return new \ReflectionClass($this->element)->getProperty('children')->getValue($this->element);
    }

    protected function getClassName(string $namespace): string
    {
        $path = explode('\\', $namespace);

        if (count($path) > 2 && in_array($path[count($path) - 2], ['Head', 'Body'])) {
            return $path[count($path) - 1];
        }

        return sprintf('%s%s', $path[count($path) - 2], $path[count($path) - 1]);
    }
}
