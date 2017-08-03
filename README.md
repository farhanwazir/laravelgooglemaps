# Laravel Google Maps
[![Rank](https://phppackages.org/p/farhanwazir/laravelgooglemaps/badge/rank.svg)](http://phppackages.org/p/farhanwazir/laravelgooglemaps)
[![Total Downloads](https://poser.pugx.org/farhanwazir/laravelgooglemaps/d/total.svg)](https://packagist.org/packages/farhanwazir/laravelgooglemaps)
[![Latest Stable Version](https://poser.pugx.org/farhanwazir/laravelgooglemaps/v/stable.svg)](https://packagist.org/packages/farhanwazir/laravelgooglemaps)
[![Latest Unstable Version](https://poser.pugx.org/farhanwazir/laravelgooglemaps/v/unstable.svg)](https://packagist.org/packages/farhanwazir/laravelgooglemaps)
[![License](https://poser.pugx.org/farhanwazir/laravelgooglemaps/license.svg)](https://packagist.org/packages/farhanwazir/laravelgooglemaps)

This repo aims to use google map features in laravel 5.x. It is easy to use and flexible, you can just install this package and enjoy google map in your website and/or applications.


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
    17. Proxy

### Services & Libraries
    1. Directions
    2. Geocoding
    3. Geometry
    4. Drawing
    5. Places
    6. Autocomplete
    7. Adsense
    8. Geofence (For now only server side geofence available)

## Installation
Add in composer.json
```
  "require": {
      "farhanwazir/laravelgooglemaps": "^2.3"
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

And finally add in the alias section `config/app.php`
```php
        'GMaps' => FarhanWazir\GoogleMaps\Facades\GMapsFacade::class,
```

Now publish configuration file
```php
    php artisan vendor:publish --provider="FarhanWazir\GoogleMaps\GMapsServiceProvider"
```

##Usage
Example files are under FarhanWazir/GoogleMaps/Example:

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
```php
Route::get('/map', 'MapController@index');

Route::get('/', function(){
    $config = array();
    $config['center'] = 'New York, USA';
    GMaps::initialize($config);
    $map = GMaps::create_map();

    echo $map['js'];
    echo $map['html'];
});
```

View Example
```html
<html>
    <head>
        {!! $map['js'] !!}
    </head>
<body>
    <div class="container">
        <div class="content">
            <div id="leftTopControl" style="padding: 5px; background-color:#fff; box-shadow: #101010; margin: 2px;">
                This is Left Top Control.
            </div>
            <div id="leftCenterControl" style="padding: 5px; background-color:#fff; box-shadow: #101010; margin: 2px;">
                This is Left Center Control.
            </div>
            <div id="leftBottomControl" style="padding: 5px; background-color:#fff; box-shadow: #101010; margin: 2px;">
                This is Left Bottom Control.
            </div>
            <div id="bottomRightControl" style="padding: 5px; background-color:#fff; box-shadow: #101010; margin: 2px;">
                This is Bottom Right Control.
            </div>
            <div id="bottomCenterControl" style="padding: 5px; background-color:#fff; box-shadow: #101010; margin: 2px;">
                This is Bottom Center Control.
            </div>
            <div id="bottomLeftControl" style="padding: 5px; background-color:#fff; box-shadow: #101010; margin: 2px;">
                This is Bottom Left Control.
            </div>
            <div id="rightTopControl" style="padding: 5px; background-color:#fff; box-shadow: #101010; margin: 2px;">
                This is Right Top Control.
            </div>
            <div id="rightCenterControl" style="padding: 5px; background-color:#fff; box-shadow: #101010; margin: 2px;">
                This is Right Center Control.
            </div>
            <div id="rightBottomControl" style="padding: 5px; background-color:#fff; box-shadow: #101010; margin: 2px;">
                This is Right Bottom Control.
            </div>
            <div id="topLeftControl" style="padding: 5px; background-color:#fff; box-shadow: #101010; margin: 2px;">
                This is Top Left Control.
            </div>
            <div id="topCenterControl" style="padding: 5px; background-color:#fff; box-shadow: #101010; margin: 2px;">
                This is Top Center Control.
            </div>
            <div id="topRightControl" style="padding: 5px; background-color:#fff; box-shadow: #101010; margin: 2px;">
                This is Top Right Control.
            </div>
            {!! $map['html'] !!}
        </div>
    </div>
</body>
</html>
```

### Geo-fence Example
```html
$polygon = array("25.774,-80.190", "18.466,-66.118", "32.321,-64.757", "25.774,-80.190"); //start and end point should be same
$latlngs = array("-12.043333,-77.028333", "-12.043333,-77.028333");

GMaps::isMarkerInsideGeofence($polygon, $latlngs); //both parameters should be in array
//return will also in array with boolean values like: array(true, false)
```

# Contribution
- Proxy feature by @grimseer - Nov 22, 2016
- Fixed to load google api via https by @wissamdagher - Apr 04, 2017
- Map full screen support by @wissamdagher - Jul 02, 2017
- Facade namespace fixed by @drehimself - Aug 03, 2017
- Fixed migration file name by @drehimself - Aug 03, 2017


# Thank you for using!
If you like it then click Fork!

Contact me if any query or suggestion you have in support section.

# Credits
Library initiative: **BioStall**

BioStall developed library for codeigniter originally, which you can found at http://biostall.com/laravel-google-maps-v3-api-package/

Conversion into Laravel from codeigniter by: **GeneaLabs** -- https://github.com/GeneaLabs/Phpgmaps (but it is incomplete)
