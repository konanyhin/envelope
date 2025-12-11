<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Abstracts;

use Konanyhin\Envelope\Body\Slot;
use Konanyhin\Envelope\Exceptions\ChildNotFoundException;
use Konanyhin\Envelope\Exceptions\InvalidChildElementException;
use Konanyhin\Envelope\Exceptions\InvalidMethodException;
use Konanyhin\Envelope\Exceptions\SlotNotFoundException;
use Konanyhin\Envelope\Traits\Attributable;

abstract class ParentElement extends Element
{
    use Attributable;

    /**
     * List of allowed child element classes for this parent.
     * This should be overridden by concrete classes if they have specific restrictions.
     *
     * @var array<string, class-string<Element>>
     */
    protected array $allowedChildClasses;

    /**
     * @var Element[]
     */
    protected array $children = [];

    /**
     * @param array<string, string> $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->setAttributes($attributes);
    }

    /**
     * Dynamically handles calls to add{ChildClass} methods for children that take only attributes.
     *
     * @param string $name method name called
     * @param array<int, mixed> $arguments arguments passed to the method
     *
     * @return Element the newly created child element
     *
     * @throws InvalidMethodException if the method does not exist or is not a recognized add method
     * @throws \InvalidArgumentException if the child element is not allowed or attributes are invalid
     */
    public function __call(string $name, array $arguments): Element
    {
        if (str_starts_with($name, 'add') && strlen($name) > 3 && isset($this->allowedChildClasses[$name])) {
            $childClass = $this->allowedChildClasses[$name];

            $child = new $childClass(...$arguments);
            $this->add($child);

            return $child;
        }

        throw new InvalidMethodException(static::class, $name);
    }

    /**
     * Add one or more elements to this parent element.
     *
     * @param Element ...$elements The elements to add.
     *
     * @return $this
     *
     * @throws InvalidChildElementException if an element is not an allowed child type
     */
    public function add(Element ...$elements): self
    {
        foreach ($elements as $element) {
            $this->validateChildElement($element);
            $this->children[] = $element;
        }

        return $this;
    }

    /**
     * Recursively searches for a Slot element by name and replaces it.
     *
     * @param string $slot the name of the slot to find
     * @param Element $element the element to replace the slot with
     *
     * @return Element Returns replacement element
     *
     * @throws SlotNotFoundException if the slot with the given name is not found
     */
    public function replace(string $slot, Element $element): Element
    {
        foreach ($this->children as $child) {
            if ($child instanceof Slot && $child->getName() === $slot) {
                return $this->replaceChild($child, $element);
            }

            if ($child instanceof ParentElement) {
                try {
                    return $child->replace($slot, $element);
                } catch (SlotNotFoundException $e) {
                    // Slot not found in this child branch, continue searching in other children
                }
            }
        }

        throw new SlotNotFoundException($slot);
    }

    /**
     * Validates if a child element is allowed for this parent.
     *
     * @param Element $element the child element to validate
     *
     * @throws InvalidChildElementException if the element is not an allowed child type
     */
    protected function validateChildElement(Element $element): void
    {
        $isValid = false;
        foreach ($this->allowedChildClasses as $allowedClass) {
            if ($element instanceof $allowedClass) {
                $isValid = true;

                break;
            }
        }

        if (!$isValid) {
            throw new InvalidChildElementException(get_class($element), static::class);
        }
    }

    /**
     * Replaces a child element with a new element.
     *
     * @param Element $oldElement the child element to replace
     * @param Element $newElement the child element to replaced with
     *
     * @return Element the new element that replaced the old one
     *
     * @throws InvalidChildElementException if the new element is not an allowed child type for this parent
     * @throws ChildNotFoundException if the old element is not found among the children
     */
    protected function replaceChild(Element $oldElement, Element $newElement): Element
    {
        $this->validateChildElement($newElement);

        foreach ($this->children as $key => $child) {
            if ($child === $oldElement) {
                return $this->children[$key] = $newElement;
            }
        }

        throw new ChildNotFoundException(get_class($oldElement), static::class);
    }

    protected function renderChildren(): string
    {
        return implode('', array_map(fn (Element $child): string => $child->render(), $this->children));
    }
}
