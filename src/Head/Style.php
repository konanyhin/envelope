<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Head;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type StyleAttributes from Types
 */
final class Style extends Element
{
    use Attributable;

    public const string TAG = 'mj-style';

    /**
     * @var string[]
     */
    private array $allowedAttributes = ['inline'];

    /**
     * @param StyleAttributes $attributes
     */
    public function __construct(private string $content = '', array $attributes = [])
    {
        $this->setAttributes($attributes);
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return $this->renderTag($this->content);
    }
}
