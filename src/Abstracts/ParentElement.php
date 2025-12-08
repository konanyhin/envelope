<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Abstracts;

use BadMethodCallException;
use InvalidArgumentException;
use Konanyhin\Envelope\Body\Accordion;
use Konanyhin\Envelope\Body\Button;
use Konanyhin\Envelope\Body\Carousel;
use Konanyhin\Envelope\Body\Column;
use Konanyhin\Envelope\Body\Divider;
use Konanyhin\Envelope\Body\Group;
use Konanyhin\Envelope\Body\Hero;
use Konanyhin\Envelope\Body\Image;
use Konanyhin\Envelope\Body\Navbar;
use Konanyhin\Envelope\Body\Raw;
use Konanyhin\Envelope\Body\Social;
use Konanyhin\Envelope\Body\Spacer;
use Konanyhin\Envelope\Body\Table;
use Konanyhin\Envelope\Body\Text;
use Konanyhin\Envelope\Body\Wrapper;
use Konanyhin\Envelope\Contracts\ElementInterface;
use Konanyhin\Envelope\Traits\Attributable;

abstract class ParentElement implements ElementInterface
{
    use Attributable;

    /**
     * List of allowed child element classes for this parent.
     * This should be overridden by concrete classes if they have specific restrictions.
     *
     * @var array<string, class-string<ElementInterface>>
     */
    protected array $allowedChildClasses = [
        'addAccordion' => Accordion::class,
        'addButton' => Button::class,
        'addCarousel' => Carousel::class,
        'addDivider' => Divider::class,
        'addImage' => Image::class,
        'addNavbar' => Navbar::class,
        'addRaw' => Raw::class,
        'addSocial' => Social::class,
        'addSpacer' => Spacer::class,
        'addTable' => Table::class,
        'addText' => Text::class,
    ];

    /**
     * @var ElementInterface[]
     */
    protected array $children = [];

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * Add one or more elements to this parent element.
     *
     * @param ElementInterface ...$elements The elements to add.
     *
     * @return $this
     *
     * @throws InvalidArgumentException if an element is not an allowed child type
     */
    public function add(ElementInterface ...$elements): self
    {
        foreach ($elements as $element) {
            $this->validateChildElement($element);
            $this->children[] = $element;
        }

        return $this;
    }

    /**
     * Validates if a child element is allowed for this parent.
     *
     * @param ElementInterface $element the child element to validate
     *
     * @throws InvalidArgumentException if the element is not an allowed child type
     */
    protected function validateChildElement(ElementInterface $element): void
    {
        $isValid = false;
        foreach ($this->allowedChildClasses as $allowedClass) {
            if ($element instanceof $allowedClass) {
                $isValid = true;

                break;
            }
        }

        if (!$isValid) {
            throw new InvalidArgumentException(sprintf(
                'Element of type %s is not an allowed child for %s.',
                get_class($element),
                static::class
            ));
        }
    }

    /**
     * Dynamically handles calls to add{ChildClass} methods for children that take only attributes.
     *
     * @param string $name method name called
     * @param array<int, mixed> $arguments arguments passed to the method
     *
     * @return $this
     *
     * @throws BadMethodCallException   if the method does not exist or is not a recognized add method
     * @throws InvalidArgumentException if the child element is not allowed or attributes are invalid
     */
    public function __call(string $name, array $arguments): self
    {
        if (str_starts_with($name, 'add') && strlen($name) > 3 && isset($this->allowedChildClasses[$name])) {
            $childClass = $this->allowedChildClasses[$name];

            $this->add(new $childClass(...$arguments));

            return $this;
        }

        throw new BadMethodCallException(sprintf('Method %s::%s does not exist.', static::class, $name));
    }

    protected function renderChildren(): string
    {
        return implode('', array_map(fn(ElementInterface $child): string => $child->render(), $this->children));
    }
}
