<?php

declare(strict_types=1);

namespace Konanyhin\Envelope;

use Konanyhin\Envelope\Abstracts\Element;
use Konanyhin\Envelope\Exceptions\SlotNotFoundException;
use Konanyhin\Envelope\Traits\Attributable;
use Spatie\Mjml\Exceptions\CouldNotConvertMjml;
use Spatie\Mjml\Mjml;
use Spatie\Mjml\MjmlResult;

/**
 * @phpstan-import-type EnvelopeAttributes from Types
 *
 * @see https://documentation.mjml.io/section/mjml
 */
final class Envelope extends Element
{
    use Attributable;

    /**
     * @var string[]
     */
    private array $allowedAttributes = [
        'owa', 'lang', 'dir',
    ];

    /**
     * @var array<string, mixed>
     */
    private array $mjmlOptions = [];

    private Body $body;

    private Head $head;

    /**
     * @param EnvelopeAttributes $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->setAttributes($attributes);
        $this->validateAttributes($this->allowedAttributes);
        $this->head = new Head();
        $this->body = new Body();
    }

    /**
     * @param EnvelopeAttributes $attributes
     */
    public static function new(array $attributes = []): self
    {
        return new self($attributes);
    }

    public function body(Element ...$elements): self
    {
        $this->body->add(...$elements);

        return $this;
    }

    public function head(Element ...$elements): self
    {
        $this->head->add(...$elements);

        return $this;
    }

    public function getBody(): Body
    {
        return $this->body;
    }

    public function getHead(): Head
    {
        return $this->head;
    }

    /**
     * @param array<string, mixed> $options
     */
    public function setMjmlOptions(array $options): self
    {
        $this->mjmlOptions = $options;

        return $this;
    }

    /**
     * Replaces a Slot element with a new element within the Envelope's body structure.
     *
     * @param string $slot the name of the slot to find
     * @param Element $element the element to replace the slot with
     *
     * @return Element Returns new element
     *
     * @throws SlotNotFoundException if the slot with the given name is not found
     */
    public function replace(string $slot, Element $element): Element
    {
        return $this->body->replace($slot, $element);
    }

    /**
     * @throws CouldNotConvertMjml
     *
     * @see https://github.com/mjmlio/mjml?tab=readme-ov-file#inside-nodejs
     */
    public function toHtml(): string
    {
        return $this->convert()->html();
    }

    /**
     * @throws CouldNotConvertMjml
     *
     * @see https://github.com/mjmlio/mjml?tab=readme-ov-file#inside-nodejs
     */
    public function convert(): MjmlResult
    {
        return Mjml::new()->convert($this->render(), $this->mjmlOptions);
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
