<?php

declare(strict_types=1);

namespace Konanyhin\Envelope;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Traits\Attributable;
use Spatie\Mjml\Mjml;

/**
 * @see https://documentation.mjml.io/section/mjml
 */
class Envelope extends Element
{
    use Attributable;

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'owa', 'lang', 'dir',
    ];

    private Body $body;

    private Head $head;

    /**
     * @param array{owa?: string, lang?: string, dir?: string} $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->validateAttributes($this->allowedAttributes);
        $this->head = new Head();
        $this->body = new Body();
    }

    /**
     * @param array{owa?: string, lang?: string, dir?: string} $attributes
     */
    public static function new(array $attributes = []): self
    {
        return new self($attributes);
    }

    public function getBody(): Body
    {
        return $this->body;
    }

    public function setBody(Body $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getHead(): Head
    {
        return $this->head;
    }

    public function setHead(Head $head): self
    {
        $this->head = $head;

        return $this;
    }

    public function toHtml(): string
    {
        return Mjml::new()->toHtml($this->render());
    }

    public function render(): string
    {
        return sprintf(
            '<mjml%s>%s%s</mjml>',
            $this->renderAttributes(),
            $this->head->render(),
            $this->body->render()
        );
    }
}
