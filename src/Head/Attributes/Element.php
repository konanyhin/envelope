<?php

declare(strict_types=1);

namespace Konanyhin\Envelope\Head\Attributes;

use Konanyhin\Envelope\Abstracts\Element as AbstractElement;
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
use Konanyhin\Envelope\Body\Section;
use Konanyhin\Envelope\Body\Social;
use Konanyhin\Envelope\Body\Spacer;
use Konanyhin\Envelope\Body\Table;
use Konanyhin\Envelope\Body\Text;
use Konanyhin\Envelope\Body\Wrapper;
use Konanyhin\Envelope\Exceptions\InvalidMjmlTagException;
use Konanyhin\Envelope\Traits\Attributable;
use Konanyhin\Envelope\Types;

/**
 * @phpstan-import-type HeadAttributesElementAttributes from Types
 */
class Element extends AbstractElement
{
    use Attributable;

    private string $tagName;

    /**
     * @var string[]
     */
    private array $validElements = [
        Accordion::TAG,
        Button::TAG,
        Carousel::TAG,
        Column::TAG,
        Divider::TAG,
        Group::TAG,
        Hero::TAG,
        Image::TAG,
        Navbar::TAG,
        Raw::TAG,
        Section::TAG,
        Social::TAG,
        Spacer::TAG,
        Table::TAG,
        Text::TAG,
        Wrapper::TAG,
        'mj-all',
        'mj-class',
    ];

    /**
     * @param HeadAttributesElementAttributes $attributes
     */
    public function __construct(string $tagName, array $attributes = [])
    {
        if (!in_array($tagName, $this->validElements, true)) {
            throw new InvalidMjmlTagException($tagName);
        }

        $this->tagName = $tagName;
        $this->setAttributes($attributes);
    }

    public function render(): string
    {
        return sprintf("<%s%s />\n", $this->tagName, $this->renderAttributes());
    }
}
