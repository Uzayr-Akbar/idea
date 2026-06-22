<?php

declare(strict_types=1);

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/ideas');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);

    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create'])->name('login');

    Route::post('/login', [SessionsController::class, 'store']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [SessionsController::class, 'destroy']);

    Route::get('/ideas', [IdeaController::class, 'index'])->name('idea.index');

    Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('idea.show');

    Route::get('/ideas/create', [IdeaController::class, 'create']);

    Route::post('/ideas', [IdeaController::class, 'store']);
});

Route::get('/randomRoute', fn () => view('idea.index'));
