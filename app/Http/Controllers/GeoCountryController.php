<?php

namespace App\Http\Controllers;

use App\Models\CountryTag;
use App\Models\GeoCountry;
use Illuminate\Http\Request;

class GeoCountryController extends Controller
{
    public function lookup(Request $request)
    {
        $id = GeoCountry::geoLookup($request->get('lat'), $request->get('lng'))?->id;
        if (!is_null($id))
            return CountryTag::where('id', $id)->where('key', $request->get('key') ?? 'int_name')->first();
        return $id;
    }
}
