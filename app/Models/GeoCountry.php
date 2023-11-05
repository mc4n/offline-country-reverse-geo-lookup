<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeoCountry extends Model
{
    protected $table = 'rgc_country';

    public static function geoLookup(float $latitude, float $longitude): ?self
    {
        return self::query()
            ->whereRaw('x = cast((? + 180) / 360 * 65536 as unsigned integer)', [$longitude])
            ->whereRaw('y1 <= cast((? + 90) / 180 * 65536 as unsigned integer)', [$latitude])
            ->whereRaw('y2 >= cast((? + 90) / 180 * 65536 as unsigned integer)', [$latitude])
            ->first();
    }
}
