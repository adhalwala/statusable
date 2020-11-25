# Add status to any model

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aecor/statusable.svg?style=flat-square)](https://packagist.org/packages/aecor/statusable)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/aecor/statusable/run-tests?label=tests)](https://github.com/aecor/statusable/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/aecor/statusable.svg?style=flat-square)](https://packagist.org/packages/aecor/statusable)

## Installation

You can install the package via composer:

```bash
composer require aecor/statusable
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Aecor\Status\StatusServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Aecor\Status\StatusServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

``` php
$statusable = new Aecor\Status();
echo $statusable->echoPhrase('Hello, Aecor!');
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Abrar Dhalwala](https://github.com/adhalwala)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
