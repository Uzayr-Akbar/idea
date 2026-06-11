<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionsController;

Route::get('/', fn() => view('welcome'));


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);

    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create']);

    Route::post('/login', [SessionsController::class, 'store']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [SessionsController::class, 'destroy']);
});
