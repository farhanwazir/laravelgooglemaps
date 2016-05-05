# Laravel Google Maps
[![Rank](https://phppackages.org/p/farhanwazir/laravelgooglemaps/badge/rank.svg)](http://phppackages.org/p/farhanwazir/laravelgooglemaps)
[![Total Downloads](https://poser.pugx.org/farhanwazir/laravelgooglemaps/d/total.svg)](https://packagist.org/packages/farhanwazir/laravelgooglemaps)
[![Latest Stable Version](https://poser.pugx.org/farhanwazir/laravelgooglemaps/v/stable.svg)](https://packagist.org/packages/farhanwazir/laravelgooglemaps)
[![Latest Unstable Version](https://poser.pugx.org/farhanwazir/laravelgooglemaps/v/unstable.svg)](https://packagist.org/packages/farhanwazir/laravelgooglemaps)
[![License](https://poser.pugx.org/farhanwazir/laravelgooglemaps/license.svg)](https://packagist.org/packages/farhanwazir/laravelgooglemaps)

This repo aims to fully featured google map in laravel 5.x

Currently only Laravel 5.x is supported.

## Features
    1. Localizing
    2. Map Types
    3. Custom Style
    4. Makers
    5. Info Window
    6. Shapes
    7. Symbols
    8. Overlays
    9. KML and GeoRSS
    10. Traffic and Bicycling Layer
    11. Geocoding Caches
    12. Controls
    13. Street View
    14. Events
    15. Reverse Geocoding
    16. Travel Moding

### Services & Libraries
    1. Directions
    2. Geocoding
    3. Geometry
    4. Drawing
    5. Places
    6. Autocomplete
    7. Adsense

## Installation
Add in composer.json
```
  "require": {
      "farhanwazir/laravelgooglemaps": "^1.8"
      ----
  }
```
Then
```
  composer update
```
Or install via composer cli
```
  composer require farhanwazir/laravelgooglemaps
```

Add service provider `config/app.php`
```php
        FarhanWazir\GoogleMaps\GMapsServiceProvider::class,
```

And finally adf in the alias section `config/app.php`
```php
        'GMaps' => FarhanWazir\GoogleMaps\Facades\GMapsFacade::class,
```

Now publish configuration file
```php
    php artisan vendor:publish --provider="FarhanWazir\GoogleMaps\GMapsServiceProvider" --tag="config"
```

##Usage
Example files are under src/FarhanWazir/GoogleMaps/example:

Controller Example

Route Example

View Example
