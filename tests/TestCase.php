<?php

declare(strict_types=1);

namespace Tests;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Exceptions\InvalidChildElementException;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public Element $element;

    public function parentMethodExists(string $namespace): void
    {
        expect(fn () => $this->element->add($namespace::fake()))
            ->not
            ->toThrow(InvalidChildElementException::class);
    }

    public function parentMethodNotExist(string $namespace): void
    {
        expect(fn () => $this->element->add($namespace::fake()))
            ->toThrow(InvalidChildElementException::class);
    }

    public function rendersCorrectly(?string $content = ''): void
    {
        expect($this->element->render())->toBeString()->toBe(sprintf('<%1$s>%2$s</%1$s>', $this->element::class::TAG, $content));
    }

    public function rendersCorrectlyAsShortTag(): void
    {
        expect($this->element->render())->toBeString()->toBe(sprintf('<%s />', $this->element::class::TAG));
    }

    /**
     * @throws \ReflectionException
     */
    public function getProperty(string $property, ?object $instance = null)
    {
        $instance ??= $this->element;

        return (new \ReflectionClass($instance))->getProperty($property)->getValue($instance);
    }

    protected function getClassName(string $namespace): object
    {
        return \Mockery::mock($namespace);
    }
}
