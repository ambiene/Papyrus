# Papyrus Package for Laravel

The Papyrus package is a Laravel service provider designed to facilitate seamless integration with Google Books API.

## Installation

### Service Provider and Facade

If your Laravel version does not automatically discover service providers, add the provider and facade to your `config/app.php`:

```php
'providers' => [
    // Other Service Providers

    Ambiene\Papyrus\ServiceProvider::class,
],

'aliases' => [
    // Other Facades

    'Papyrus' => Ambiene\Papyrus\Facades\Papyrus::class,
]
```

## Publishing Configuration

Publish the Papyrus configuration file to your application's config directory:

```bash
php artisan vendor:publish --provider="Ambiene\Papyrus\ServiceProvider" --tag="config"
```

This will create a `papyrus.php` file in your `config` directory.

## Configuration

After publishing the configuration file, edit config/papyrus.php:

```php
return [
    'api_key' => env('PAPYRUS_API_KEY'),
    'base_uri' => env('PAPYRUS_API_URL', 'https://www.googleapis.com/books/v1/'),
    'batchSize' => env('PAPYRUS_BATCH_SIZE', 10),
    'language' => env('PAPYRUS_LANGUAGE', 'en'),
];
```

Ensure you set the PAPYRUS_API_KEY in your .env file:

```bash
PAPYRUS_API_KEY=your_google_books_api_key_here
```

## Usage

```php
use Ambiene\Papyrus\Facades\Papyrus;

$results = Papyrus::search('The Great Gatsby');
```

You can also specify a batch size and language when searching:

```php
$results = Papyrus::search('1984', 15, 'fr');
```
