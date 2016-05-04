<?php

namespace App\Http\Controllers;

use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;

use App\Http\Requests;

class MapController extends Controller
{

    protected $gmap;

    public function __construct(GMaps $gmap){
        $this->gmap = $gmap;
    }

    public function index(){
        $config = array();
        $config['center'] = 'Defence Garden, Karachi';
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';

        $this->gmap->initialize($config);

        // set up the marker ready for positioning
        // once we know the users location
        $marker = array();
        $this->gmap->add_marker($marker);

        $map = $this->gmap->create_map();

        return view('map', ['map' => $map]);
    }
}
