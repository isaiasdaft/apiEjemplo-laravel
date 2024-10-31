<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


Route::get('/', function () {
    return view('users');
});

Route::get('/api/users', [ApiController::class, 'getUser']);


