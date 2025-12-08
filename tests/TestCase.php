<?php

namespace Tests;

use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Exceptions\InvalidMethodException;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public ElementInterface $element;

    public function parentMethodExists(string $namespace): void
    {
        expect(fn() => $this->element->{'add' . $this->getClassName($namespace)}())
            ->not
            ->toThrow(InvalidMethodException::class);
    }

    public function parentMethodNotExist(string $namespace): void
    {
        expect(fn() => $this->element->{'add' . $this->getClassName($namespace)}())
            ->toThrow(InvalidMethodException::class);
    }

    protected function getClassName(string $namespace): string
    {
        return substr(strrchr($namespace, "\\"), 1);
    }
}
