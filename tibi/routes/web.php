<?php

use App\Http\Controllers\TodoItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/todo_items', TodoItemController::class);

Route::get('/{pathMatch}', function () {
    return view('welcome');
})->where('pathMatch', '.*');
