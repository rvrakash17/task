<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\DataController;

Route::get('/table', [DataController::class, 'index']);
