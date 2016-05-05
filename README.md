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

Controller Example; reference code for display method
```php
/******** Custom Map Controls ********/

        $leftTopControls = ['document.getElementById("leftTopControl")']; // values must be html or javascript element
        $this->gmap->injectControlsInLeftTop = $leftTopControls; // inject into map
        $leftCenterControls = ['document.getElementById("leftCenterControl")'];
        $this->gmap->injectControlsInLeftCenter = $leftCenterControls;
        $leftBottomControls = ['document.getElementById("leftBottomControl")'];
        $this->gmap->injectControlsInLeftBottom = $leftBottomControls;

        $bottomLeftControls = ['document.getElementById("bottomLeftControl")'];
        $this->gmap->injectControlsInBottomLeft = $bottomLeftControls;
        $bottomCenterControls = ['document.getElementById("bottomCenterControl")'];
        $this->gmap->injectControlsInBottomCenter = $bottomCenterControls;
        $bottomRightControls = ['document.getElementById("bottomRightControl")'];
        $this->gmap->injectControlsInBottomRight = $bottomRightControls;

        $rightTopControls = ['document.getElementById("rightTopControl")'];
        $this->gmap->injectControlsInRightTop = $rightTopControls;
        $rightCenterControls = ['document.getElementById("rightCenterControl")'];
        $this->gmap->injectControlsInRightCenter = $rightCenterControls;
        $rightBottomControls = ['document.getElementById("rightBottomControl")'];
        $this->gmap->injectControlsInRightBottom = $rightBottomControls;

        $topLeftControls = ['document.getElementById("topLeftControl")'];
        $this->gmap->injectControlsInTopLeft = $topLeftControls;
        $topCenterControls = ['document.getElementById("topCenterControl")'];
        $this->gmap->injectControlsInTopCenter = $topCenterControls;
        $topRightControls = ['document.getElementById("topRightControl")'];
        $this->gmap->injectControlsInTopRight = $topRightControls;

        /******** End Controls ********/

        $config = array();
        $config['map_height'] = "100%";
        $config['center'] = 'Clifton, Karachi';
        
        $this->gmap->initialize($config); // Initialize Map with custom configuration

        /*********** Marker Setup ***********/
        $marker = array();
        $marker['draggable'] = true;
        //Marker event dragend
        $marker['ondragend'] = '
        iw_'. $this->gmap->map_name .'.close();
        reverseGeocode(event.latLng, function(status, result, mark){
            if(status == 200){
                iw_'. $this->gmap->map_name .'.setContent(result);
                iw_'. $this->gmap->map_name .'.open('. $this->gmap->map_name .', mark);
            }
        }, this);
        ';
        $this->gmap->add_marker($marker);
        /*********** End Marker Setup ***********/

        $map = $this->gmap->create_map(); // This object will render javascript files and map view; you can call JS by $map['js'] and map view by $map['html']

        return view('map', ['map' => $map]);
```

Route Example

View Example
