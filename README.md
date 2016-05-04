# GMaps
This repo aims to fully featured use of google map in laravel 5.x

Currently only Laravel 5.x is supported.

## Installation
Add in composer.json
```
  "require": {
      "farhanwazir/laravelgooglemaps": "@dev"
      ----
  }
```
Then
```
  composer update
```
Or install via composer cli
```
  composer require farhanwazir/laravelgooglemaps:@dev
```

Add service provider `config/app.php`
```php
        FarhanWazir\GoogleMaps\GMapsServiceProvider::class,
```

And finally adf in the alias section `config/app.php`
```php
        'Mappy' => FarhanWazir\GoogleMaps\Facades\GMapsFacade::class,
```

Now publish configuration file
```php
    php artisan vendor:publish --provider="FarhanWazir\GoogleMaps\GMapsServiceProvider" --tag="config"
```

##Usage
Examples files are under src/FarhanWazir/GoogleMaps/example:
Controller Example
Route Example
View Example
