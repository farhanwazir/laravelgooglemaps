# GMaps
This repo aims to fully featured use of google map in laravel 5.x

Currently only Laravel 5.x is supported.

## Installation Changes
Add the repo to composer.json under this new namespace:
```
  "require": {
      "farhanwazir/laravelgooglemaps": "@dev"
  }
```

Then add the service provider entry to `config/app.php`:
```php
        FarhanWazir\GoogleMaps\GMapsServiceProvider::class,
```

And the Facade in the alias section (further down in `config/app.php`):
```php
        'Mappy' => FarhanWazir\GoogleMaps\Facades\GMapsFacade::class,
```

Now publish configuration file by
```php
    php artisan vendor:publish --provider="FarhanWazir\GoogleMaps\GMapsServiceProvider" --tag="config"
```