<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function leaflet()
    {
        return view('leaflet-map');
    }
}
