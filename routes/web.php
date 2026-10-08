<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerceroController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PolizaController;

Route::get('/', function () {
    return view('index');
});


Route::resource('terceros', TerceroController::class);
Route::resource('planes', PlanController::class);
Route::resource('polizas', PolizaController::class);