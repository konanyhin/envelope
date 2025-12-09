<?php

declare(strict_types=1);

namespace Konanyhin\Envelope;

/**
 * This file is used to define global type aliases for PHPStan.
 *
 * @phpstan-type EnvelopeAttributes array{owa?: string, lang?: string, dir?: string}
 * @phpstan-type AccordionElementAttributes array{
 *     background-color?: string,
 *     border?: string,
 *     font-family?: string,
 *     icon-align?: string,
 *     icon-height?: string,
 *     icon-position?: string,
 *     icon-unwrapped-alt?: string,
 *     icon-unwrapped-url?: string,
 *     icon-width?: string,
 *     icon-wrapped-alt?: string,
 *     icon-wrapped-url?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string
 * }
 * @phpstan-type AccordionElementChildAttributes array{
 *     background-color?: string,
 *     color?: string,
 *     font-family?: string,
 *     font-size?: string,
 *     font-style?: string,
 *     font-weight?: string,
 *     letter-spacing?: string,
 *     line-height?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string
 * }
 * @phpstan-type AccordionMainAttributes array{
 *     border?: string,
 *     container-background-color?: string,
 *     font-family?: string,
 *     icon-align?: string,
 *     icon-height?: string,
 *     icon-position?: string,
 *     icon-unwrapped-alt?: string,
 *     icon-unwrapped-url?: string,
 *     icon-width?: string,
 *     icon-wrapped-alt?: string,
 *     icon-wrapped-url?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string
 * }
 * @phpstan-type BodyAttributes array{background-color?: string, css-class?: string, width?: string}
 * @phpstan-type ButtonAttributes array{
 *     align?: string,
 *     background-color?: string,
 *     border?: string,
 *     border-bottom?: string,
 *     border-left?: string,
 *     border-radius?: string,
 *     border-right?: string,
 *     border-top?: string,
 *     color?: string,
 *     container-background-color?: string,
 *     font-family?: string,
 *     font-size?: string,
 *     font-style?: string,
 *     font-weight?: string,
 *     height?: string,
 *     href?: string,
 *     inner-padding?: string,
 *     letter-spacing?: string,
 *     line-height?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string,
 *     rel?: string,
 *     target?: string,
 *     text-align?: string,
 *     text-decoration?: string,
 *     text-transform?: string,
 *     vertical-align?: string,
 *     width?: string
 * }
 * @phpstan-type CarouselAttributes array{
 *     align?: string,
 *     border-radius?: string,
 *     container-background-color?: string,
 *     icon-width?: string,
 *     left-icon?: string,
 *     right-icon?: string,
 *     tb-border?: string,
 *     tb-border-radius?: string,
 *     tb-hover-border-color?: string,
 *     tb-selected-border-color?: string,
 *     tb-width?: string,
 *     thumbnails?: string
 * }
 * @phpstan-type CarouselImageAttributes array{
 *     alt?: string,
 *     href?: string,
 *     rel?: string,
 *     src?: string,
 *     target?: string,
 *     thumbnails-src?: string,
 *     title?: string
 * }
 * @phpstan-type ColumnAttributes array{
 *     background-color?: string,
 *     border?: string,
 *     border-bottom?: string,
 *     border-left?: string,
 *     border-radius?: string,
 *     border-right?: string,
 *     border-top?: string,
 *     css-class?: string,
 *     inner-background-color?: string,
 *     inner-border?: string,
 *     inner-border-bottom?: string,
 *     inner-border-left?: string,
 *     inner-border-radius?: string,
 *     inner-border-right?: string,
 *     inner-border-top?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string,
 *     vertical-align?: string,
 *     width?: string
 * }
 * @phpstan-type DividerAttributes array{
 *     border-color?: string,
 *     border-style?: string,
 *     border-width?: string,
 *     container-background-color?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string,
 *     width?: string
 * }
 * @phpstan-type GroupAttributes array{
 *     background-color?: string,
 *     direction?: string,
 *     vertical-align?: string,
 *     width?: string
 * }
 * @phpstan-type HeroAttributes array{
 *     background-color?: string,
 *     background-height?: string,
 *     background-position?: string,
 *     background-url?: string,
 *     background-width?: string,
 *     height?: string,
 *     mode?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string,
 *     vertical-align?: string,
 *     width?: string
 * }
 * @phpstan-type ImageAttributes array{
 *     align?: string,
 *     alt?: string,
 *     border?: string,
 *     border-bottom?: string,
 *     border-left?: string,
 *     border-radius?: string,
 *     border-right?: string,
 *     border-top?: string,
 *     container-background-color?: string,
 *     fluid-on-mobile?: string,
 *     height?: string,
 *     href?: string,
 *     name?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string,
 *     rel?: string,
 *     src?: string,
 *     srcset?: string,
 *     target?: string,
 *     title?: string,
 *     usemap?: string,
 *     width?: string
 * }
 * @phpstan-type NavbarAttributes array{
 *     align?: string,
 *     base-url?: string,
 *     hamburger?: string,
 *     ico-align?: string,
 *     ico-close?: string,
 *     ico-color?: string,
 *     ico-font-family?: string,
 *     ico-font-size?: string,
 *     ico-line-height?: string,
 *     ico-open?: string,
 *     ico-padding?: string,
 *     ico-padding-bottom?: string,
 *     ico-padding-left?: string,
 *     ico-padding-right?: string,
 *     ico-padding-top?: string,
 *     ico-text-decoration?: string,
 *     ico-text-transform?: string
 * }
 * @phpstan-type NavbarLinkAttributes array{
 *     color?: string,
 *     font-family?: string,
 *     font-size?: string,
 *     font-style?: string,
 *     font-weight?: string,
 *     href?: string,
 *     letter-spacing?: string,
 *     line-height?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string,
 *     rel?: string,
 *     target?: string,
 *     text-decoration?: string,
 *     text-transform?: string
 * }
 * @phpstan-type SectionAttributes array{
 *     background-color?: string,
 *     background-position?: string,
 *     background-position-x?: string,
 *     background-position-y?: string,
 *     background-repeat?: string,
 *     background-size?: string,
 *     background-url?: string,
 *     border?: string,
 *     border-bottom?: string,
 *     border-left?: string,
 *     border-radius?: string,
 *     border-right?: string,
 *     border-top?: string,
 *     css-class?: string,
 *     direction?: string,
 *     full-width?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string,
 *     text-align?: string,
 *     vertical-align?: string
 * }
 * @phpstan-type SocialAttributes array{
 *     align?: string,
 *     border-radius?: string,
 *     color?: string,
 *     container-background-color?: string,
 *     font-family?: string,
 *     font-size?: string,
 *     font-style?: string,
 *     font-weight?: string,
 *     icon-height?: string,
 *     icon-size?: string,
 *     inner-padding?: string,
 *     line-height?: string,
 *     mode?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string,
 *     table-layout?: string,
 *     text-decoration?: string
 * }
 * @phpstan-type SocialElementAttributes array{
 *     align?: string,
 *     background-color?: string,
 *     border-radius?: string,
 *     color?: string,
 *     font-family?: string,
 *     font-size?: string,
 *     font-style?: string,
 *     font-weight?: string,
 *     href?: string,
 *     icon-height?: string,
 *     icon-size?: string,
 *     line-height?: string,
 *     name?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string,
 *     rel?: string,
 *     src?: string,
 *     target?: string,
 *     text-decoration?: string,
 *     title?: string,
 *     vertical-align?: string
 * }
 * @phpstan-type SpacerAttributes array{
 *     container-background-color?: string,
 *     height?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string,
 *     vertical-align?: string
 * }
 * @phpstan-type TableAttributes array{
 *     align?: string,
 *     cellpadding?: string,
 *     cellspacing?: string,
 *     color?: string,
 *     container-background-color?: string,
 *     font-family?: string,
 *     font-size?: string,
 *     line-height?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string,
 *     table-layout?: string,
 *     width?: string
 * }
 * @phpstan-type TextAttributes array{
 *      align?: string,
 *      color?: string,
 *      container-background-color?: string,
 *      font-family?: string,
 *      font-size?: string,
 *      font-style?: string,
 *      font-weight?: string,
 *      height?: string,
 *      letter-spacing?: string,
 *      line-height?: string,
 *      padding?: string,
 *      padding-bottom?: string,
 *      padding-left?: string,
 *      padding-right?: string,
 *      padding-top?: string,
 *      text-decoration?: string,
 *      text-transform?: string
 *  }
 * @phpstan-type WrapperAttributes array{
 *     background-color?: string,
 *     background-position?: string,
 *     background-repeat?: string,
 *     background-size?: string,
 *     background-url?: string,
 *     border?: string,
 *     border-bottom?: string,
 *     border-left?: string,
 *     border-radius?: string,
 *     border-right?: string,
 *     border-top?: string,
 *     css-class?: string,
 *     full-width?: string,
 *     padding?: string,
 *     padding-bottom?: string,
 *     padding-left?: string,
 *     padding-right?: string,
 *     padding-top?: string,
 *     text-align?: string
 * }
 * @phpstan-type BreakpointAttributes array{
 *     width?: string
 * }
 * @phpstan-type FontAttributes array{
 *     name?: string,
 *     href?: string
 * }
 * @phpstan-type HeadAttributesElementAttributes array<string, string>
 * @phpstan-type StyleAttributes array{
 *     inline?: string
 * }
 */
final class Types {}
