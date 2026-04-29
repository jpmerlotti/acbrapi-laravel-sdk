# ACBr API Laravel SDK

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jpmerlotti/acbrapi-laravel-sdk.svg?style=flat-square)](https://packagist.org/packages/jpmerlotti/acbrapi-laravel-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/jpmerlotti/acbrapi-laravel-sdk.svg?style=flat-square)](https://packagist.org/packages/jpmerlotti/acbrapi-laravel-sdk)

The Laravel SDK for integrating with ACBr API. Designed to make issuing Brazilian fiscal documents (NFe, NFCe, CTe, etc.) a simple and elegant task in Laravel.

## Installation

You can install the package via composer:

```bash
composer require jpmerlotti/acbrapi-laravel-sdk
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="acbrapi-config"
```

## Usage

Configure your credentials in your `.env` file:

```env
ACBR_API_TOKEN=your_token_here
ACBR_API_ENV=sandbox
```

### Issuing an NFe Example

```php
use ACBr\Laravel\Facades\ACBr;

$response = ACBr::nfe()->emitirNfe($data);

if ($response->getStatus() === 'authorized') {
    return "NFe issued successfully: " . $response->getChave();
}
```

### Zip Code (CEP) Lookup

```php
use ACBr\Laravel\Facades\ACBr;

$address = ACBr::cep()->consultarCep('01001000');
```

## Installation Presets (Coming Soon)

This SDK offers presets for different stacks:
- [x] Laravel API Only (Core) - **Stable on PHP 8.1-8.4 & L10-L12**
- [ ] Laravel + Blade
- [ ] Laravel + Livewire
- [ ] FilamentPHP Plugin

> [!NOTE]
> **PHP 8.5 & Laravel 13 Support:** As of April 2026, some testing dependencies (like Pest plugins) are still catching up with Laravel 13. We are monitoring the ecosystem and will enable full support as soon as stable versions are released. Currently, PHP 8.5 may experience runtime instabilities on older Laravel versions.

## Testing

The project uses [Pest PHP](https://pestphp.com/) for testing.

```bash
composer test
```

## Credits

- [João Paulo Merlotti](https://github.com/jpmerlotti)
- [Based on the official ACBr API SDK](https://github.com/projeto-acbr-oficial/acbrapi-sdk-php)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
