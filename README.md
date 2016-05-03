# GMaps
This repo aims to keep farhanwazir/laravelgooglemaps alive, hopefully filling in temporarily until they make their repo
available again, or else continuing its maintenance going forward and keeping it working with future versions of
Laravel.

Currently only Laravel 5.* is supported.

## Installation Changes
Add the repo to composer.json under this new namespace:
```
  "require": {
      "farhanwazir/laravelgooglemaps": "~0.5.5"
  }
```

Then add the service provider entry to `config/app.php`:
```php
        FarhanWazir\GoogleMaps\GMapsServiceProvider::class,
```

And the Facade in the alias section (further down in `config/app.php`):
```php
        'GoogleMap' => FarhanWazir\GoogleMaps\Facades\GMapsFacade::class,
```

