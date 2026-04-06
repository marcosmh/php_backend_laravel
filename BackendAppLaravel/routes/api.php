<?php

use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;


Route::get("/test", function() {
    return "El backend funciona correctamente";
});

Route::get("/backend", [BackendController::class, "getAll"]);

Route::get("/backend/{id?}", [BackendController::class, "get"]);

Route::Post("/backend", [BackendController::class, "create"]);

Route::Put("/backend/{id}", [BackendController::class, "update"]);

Route::Delete("/backend/{id}", [BackendController::class, "delete"]);


