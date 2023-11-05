<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeoCountryController;

Route::get('lookup', [GeoCountryController::class, 'lookup']);
