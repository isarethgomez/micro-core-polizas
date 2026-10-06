<?php

use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('planes.index');
});

Route::resource('planes', PlanController::class)->parameters([
    'planes' => 'plan'
]);