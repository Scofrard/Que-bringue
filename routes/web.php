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
    Route::get('/users', 'index')->name('index');
    Route::get('/users', 'create')->name('create');
    Route::get('/users', 'destroy')->name('destroy');
    Route::get('/users', 'update')->name('update');
    Route::get('/users', 'edit')->name('edit');
    Route::get('/users', 'show')->name('show');
    Route::get('/users', 'store')->name('store');
});

//Reservation
Route::controller(ReservationController::class)->name('reservation.')->group(function () {
    Route::get('/reservation', 'index')->name('index');
    Route::get('/reservation', 'create')->name('create');
    Route::get('/reservation', 'destroy')->name('destroy');
    Route::get('/reservation', 'update')->name('update');
    Route::get('/reservation', 'edit')->name('edit');
    Route::get('/reservation', 'show')->name('show');
    Route::get('/reservation', 'store')->name('store');
});

Route::controller(EventController::class)->name('event.')->group(function () {
    Route::get('/event', 'index')->name('index');
    Route::get('/event', 'create')->name('create');
    Route::get('/event', 'destroy')->name('destroy');
    Route::get('/event', 'update')->name('update');
    Route::get('/event', 'edit')->name('edit');
    Route::get('/event', 'show')->name('show');
    Route::get('/event', 'store')->name('store');
});
