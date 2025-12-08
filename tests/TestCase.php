<?php

namespace Tests;

use BadMethodCallException;
use Konanyhin\Envelope\Contracts\ElementInterface;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public ElementInterface $element;

    public function parentMethodExists(string $namespace): void
    {
        expect(fn() => $this->element->{'add' . $this->getClassName($namespace)}())
            ->not
            ->toThrow(BadMethodCallException::class);
    }

    public function parentMethodNotExist(string $namespace): void
    {
        expect(fn() => $this->element->{'add' . $this->getClassName($namespace)}())
            ->toThrow(BadMethodCallException::class);
    }

    protected function getClassName(string $namespace): string
    {
        return substr(strrchr($namespace, "\\"), 1);
    }
}
