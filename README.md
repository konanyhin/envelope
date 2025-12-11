<div>
    <img src="img/banner.png" width="100%" alt="Envelope">
</div>

# Envelope

[![License](https://img.shields.io/github/license/konanyhin/envelope?logo=github)](https://github.com/konanyhin/envelope/blob/master/LICENSE)
[![PHP Version](https://img.shields.io/packagist/php-v/konanyhin/envelope?logo=php&logoColor=white)](https://packagist.org/packages/konanyhin/envelope)
[![Current Version](https://img.shields.io/packagist/v/konanyhin/envelope?logo=packagist&logoColor=white)](https://packagist.org/packages/konanyhin/envelope)

Envelope is a PHP library for building MJML emails with a clean, object-oriented approach.

## Requirements

| Name     | Description |
|:---------|:------------|
| **PHP**  | \>= 8.3     |
| **mjml** | npm / yarn  |

## 📦 Installation

First, install the package via Composer:

```bash
composer require konanyhin/envelope
```

This library also requires the official MJML JavaScript engine to render the final HTML. Make sure you have **Node.js 16 or higher** installed, then install
`mjml` in your project:

```bash
# With npm
npm install mjml

# Or with Yarn
yarn add mjml
```

## ✨ Key features

* **Fluent & Clean**: Chain methods to build your email structure naturally.
* **Component Helpers**: Quickly create any MJML component with static helpers.
* **Dynamic Slots**: Create templates with placeholders and fill them with content later.
* **Built-in Validation**: Catches errors like invalid attributes or misplaced elements.

## 🚀 Quick Start

```php
use Konanyhin\Envelope\Envelope;
use Konanyhin\Envelope\Helpers\Body;
use Konanyhin\Envelope\Helpers\Head;

$envelope = Envelope::new();

// Add elements to the <mj-head>
$envelope->head(
    Head::title('My Awesome Email'),
    Head::preview('Sneak peek of the content...')
);

// Add elements to the <mj-body>
$envelope->body(
    Body::section()->add(
        Body::column()->add(
            Body::text('Left Column', ['color' => '#333333'])
        ),
        Body::column()->add(
            Body::text('Right Column', ['color' => '#555555'])
        ),
    ),
    Body::section()->add(
        Body::column()->add(
            Body::button('Click Me', ['href' => 'https://example.com'])
        )
    )            
);

// Get the final HTML
echo $envelope->toHtml();
```

## ⚙️ Advanced Configuration

### `setMjmlOptions(array $options)`

You can pass an array of options to the underlying MJML engine. This is useful for things like enabling minification or setting the validation level.

```php
$envelope->setMjmlOptions([
    'minify' => true,
    'validationLevel' => 'strict',
]);
```

The available options are:

* `fonts`
* `keepComments`
* `beautify`
* `minify`
* `validationLevel`
* `filePath`
* `mjmlConfigPath`
* `useMjmlConfigOptions`
* `juiceOptions`
* `juicePreserveTags`
* `minifyOptions`
* `preprocessors`

An `InvalidMjmlOptionException` will be thrown if you provide an invalid option.

## 🧩 The Slot System: Dynamic Content Made Easy

Slots are placeholders you can put anywhere in your layout. This is perfect for creating a master template and filling it with different content later.

### 1. Define a Layout with Slots

You can configure your base template, for example, in your Dependency Injection container. You can define multiple slots for different dynamic sections.

```php
use Konanyhin\Envelope\Envelope;
use Konanyhin\Envelope\Helpers\Body;

// Example container definition
return [
    Envelope::class => function () {
        $envelope = Envelope::new();

        // Define the general layout structure
        $envelope->body(
            Body::section()->add(
                Body::column()->add(
                    Body::text('Your website name'),
                    Body::slot('main_action'), // A slot for a required action
                    Body::slot('optional_footer') // A slot for optional content
                )
            )
        );

        return $envelope;
    },
];
```

### 2. Fill the Slots

Inject the `Envelope` into your service. Any slot you don't replace
will simply render as an empty string.

```php
use Konanyhin\Envelope\Envelope;
use Konanyhin\Envelope\Helpers\Body;
use Konanyhin\Envelope\Helpers\Head;

class EmailService
{
    public function __construct(
        private Envelope $envelope
    ) {}

    public function getWelcomeEmail(): string
    {
        // Set email-specific head elements
        $this->envelope->head(
            Head::title('Welcome!')
        );

        // Create the dynamic content for this specific email
        $button = Body::button('Confirm Your Account', [
            'href' => 'https://example.com/confirm',
            'background-color' => '#28a745'
        ]);

        // Find the slot and replace it with the button
        $this->envelope->replace('main_action', $button);

        // The 'optional_footer' slot was not replaced, so it will not appear in the final HTML.

        // Return the final HTML
        return $this->envelope->toHtml();
    }
}
```

The `replace()` method is smart and will throw an exception if you try to replace a slot that doesn't exist, helping you catch errors early.

## ⚠️ Known Issues

* **Duplicate Slot Names**: The library does not currently prevent the creation of multiple slots with the same name. If you define duplicate slot names,
  `replace()` will only replace the *first* one it finds. It is the user's responsibility to ensure all slot names are unique within an envelope.
* `mj-include`: This package does not support the `mj-include` tag.

## ✅ Testing

This project uses Pest for testing. To run the full test suite:

```bash
composer test
```

## 📄 License

This project is licensed under the [MIT License](LICENSE.md).
