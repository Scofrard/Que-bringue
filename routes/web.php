<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\EventController;
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

//User
Route::controller(UserController::class)->name('user.')->group(function () {
    Route::get('/users', 'show')->name('index');
    Route::get('/users', 'show')->name('create');
    Route::get('/users', 'show')->name('destroy');
    Route::get('/users', 'show')->name('update');
    Route::get('/users', 'show')->name('edit');
    Route::get('/users', 'show')->name('show');
    Route::get('/users', 'show')->name('store');
});

//Reservation
Route::controller(ReservationController::class)->name('reservation.')->group(function () {
    Route::get('/reservation', 'show')->name('index');
    Route::get('/reservation', 'show')->name('create');
    Route::get('/reservation', 'show')->name('destroy');
    Route::get('/reservation', 'show')->name('update');
    Route::get('/reservation', 'show')->name('edit');
    Route::get('/reservation', 'show')->name('show');
    Route::get('/reservation', 'show')->name('store');
});

Route::controller(EventController::class)->name('event.')->group(function () {
    Route::get('/event', 'show')->name('index');
    Route::get('/event', 'show')->name('create');
    Route::get('/event', 'show')->name('destroy');
    Route::get('/event', 'show')->name('update');
    Route::get('/event', 'show')->name('edit');
    Route::get('/event', 'show')->name('show');
    Route::get('/event', 'show')->name('store');
});
