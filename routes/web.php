<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TerceroController;

Route::get('/', function () {
    return redirect()->route('planes.index');
});

Route::resource('planes', PlanController::class)->parameters([
    'planes' => 'plan'
]);

Route::resource('terceros', TerceroController::class)->parameters([
    'terceros' => 'tercero'
]);