<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\IdeaController;

Route::redirect("/", "/ideas");

Route::group(["middleware" => "guest"], function () {
    Route::get("/register", [RegisteredUserController::class, "create"]);

    Route::post("/register", [RegisteredUserController::class, "store"]);

    Route::get("/login", [SessionsController::class, "create"])->name("login");

    Route::post("/login", [SessionsController::class, "store"]);
});

Route::group(["middleware" => "auth"], function () {
    Route::delete("/logout", [SessionsController::class, "destroy"]);

    Route::get("/ideas", [IdeaController::class, "index"]);

    Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('idea.show');
});

Route::get("/randomRoute", fn() => view("idea.index"));