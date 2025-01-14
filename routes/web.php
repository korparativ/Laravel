<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [App\Http\Controllers\TestController::class, 'index']);
Route::get('/user', [App\Http\Controllers\UserController::class, 'showUser']);
Route::get('/test1', [App\Http\Controllers\SimpleController::class, 'test']);
