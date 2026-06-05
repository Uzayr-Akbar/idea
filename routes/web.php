<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));
Route::get('/about', function (): never {
    dd('About page');
});
Route::get('/settigns', fn() => 'settings page');
