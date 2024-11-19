<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/greeting', function () {
    return 'Hello World';
});

//user.index
Route::controller(UserController::class)->name('user.')->group(function () {
    Route::get('/users', 'show')->name('index');
});
