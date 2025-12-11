<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Head;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type BreakpointAttributes from Types
 */
final class Breakpoint extends Element
{
    use Attributable;

    /**
     * @var string
     */
    public const TAG = 'mj-breakpoint';

    /**
     * @var string[]
     */
    private array $allowedAttributes = ['width'];

    /**
     * @param BreakpointAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->setAttributes($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return $this->renderTag();
    }
}
