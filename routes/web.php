<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocalisationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryEventController;
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
    Route::get('/user/{id}', 'show')->name('show');
    Route::get('/user', 'create')->name('create');
    Route::get('/user', 'destroy')->name('destroy');
    Route::get('/user', 'update')->name('update');
    Route::get('/user', 'edit')->name('edit');
    Route::get('/user', 'store')->name('store');
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

Route::controller(SettingController::class)->name('setting.')->group(function () {
    Route::get('/setting', 'index')->name('index');
    Route::get('/setting', 'create')->name('create');
    Route::get('/setting', 'destroy')->name('destroy');
    Route::get('/setting', 'update')->name('update');
    Route::get('/setting', 'edit')->name('edit');
    Route::get('/setting', 'show')->name('show');
    Route::get('/setting', 'store')->name('store');
});

Route::controller(LocalisationController::class)->name('localisation.')->group(function () {
    Route::get('/localisation', 'index')->name('index');
    Route::get('/localisation', 'create')->name('create');
    Route::get('/localisation', 'destroy')->name('destroy');
    Route::get('/localisation', 'update')->name('update');
    Route::get('/localisation', 'edit')->name('edit');
    Route::get('/localisation', 'show')->name('show');
    Route::get('/localisation', 'store')->name('store');
});

Route::controller(ImageController::class)->name('image.')->group(function () {
    Route::get('/image', 'index')->name('index');
    Route::get('/image', 'create')->name('create');
    Route::get('/image', 'destroy')->name('destroy');
    Route::get('/image', 'update')->name('update');
    Route::get('/image', 'edit')->name('edit');
    Route::get('/image', 'show')->name('show');
    Route::get('/image', 'store')->name('store');
});

Route::controller(CategoryController::class)->name('category.')->group(function () {
    Route::get('/category', 'index')->name('index');
    Route::get('/category', 'create')->name('create');
    Route::get('/category', 'destroy')->name('destroy');
    Route::get('/category', 'update')->name('update');
    Route::get('/category', 'edit')->name('edit');
    Route::get('/category', 'show')->name('show');
    Route::get('/category', 'store')->name('store');
});

Route::controller(CategoryEventController::class)->name('categoryevent.')->group(function () {
    Route::get('/categoryevent', 'index')->name('index');
    Route::get('/categoryevent', 'create')->name('create');
    Route::get('/categoryevent', 'destroy')->name('destroy');
    Route::get('/categoryevent', 'update')->name('update');
    Route::get('/categoryevent', 'edit')->name('edit');
    Route::get('/categoryevent', 'show')->name('show');
    Route::get('/categoryevent', 'store')->name('store');
});
