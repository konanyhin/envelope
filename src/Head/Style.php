<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Head;

use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Traits\Attributable;

class Style implements ElementInterface
{
    use Attributable;

    private string $content;

    /**
     * @var string[]
     */
    private array $allowedAttributes = ['inline'];

    /**
     * @param array{
     *     inline: string
     * } $attributes
     */
    public function __construct(string $content, array $attributes = [])
    {
        $this->content = $content;
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
    }

    public function render(): string
    {
        return sprintf(
            '<mj-style%s>%s</mj-style>',
            $this->renderAttributes(),
            $this->content
        );
    }
}
