<?php

/*
|--------------------------------------------------------------------------
| Example only
|--------------------------------------------------------------------------
|
| Do not replace with app routes.php file
|
*/
Route::get('/map', 'MapController@index');

Route::get('/', function(){
    $config = array();
    $config['center'] = 'Defence Garden, Karachi';
    Mappy::initialize($config);
    $map = Mappy::create_map();

    echo $map['js'];
    echo $map['html'];
});
