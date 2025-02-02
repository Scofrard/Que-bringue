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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//User
Route::controller(UserController::class)->name('user.')->group(function () {
    /*Route::get('/users', 'index')->name('index');
    Route::get('/user/{id}', 'show')->name('show');
    Route::get('/user', 'create')->name('create');
    Route::get('/user', 'destroy')->name('destroy');
    Route::get('/user', 'update')->name('update');
    Route::get('/user', 'edit')->name('edit');
    Route::post('/user/store', 'store')->name('store');*/
});

// Reservation Routes
Route::controller(ReservationController::class)->name('reservation.')->group(function () {
    Route::get('/reservations', 'index')->name('index');
    Route::get('/reservation/create/{event_id}', 'create')->name('create');
    Route::get('/reservation/{id}', 'show')->name('show');
    Route::get('/reservation/edit/{id}', 'edit')->name('edit');
    Route::post('/reservation/store', 'store')->name('store');
    Route::post('/reservation//update/{id}', 'update')->name('update');
    Route::delete('/reservation/{id}', 'destroy')->name('destroy');
});

Route::controller(EventController::class)->name('event.')->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/events', 'index')->name('index');
    Route::get('/event/{id}', 'show')->name('show');
    /*Route::get('/event/create', 'create')->name('create');
    Route::delete('/event/destroy/{id}', 'destroy')->name('destroy');
    Route::get('/event/edit/{id}', 'edit')->name('edit');
    Route::post('/event/update/{id}', 'update')->name('update');
    Route::post('/event/store', 'store')->name('store');
    Route::get('/event/{id}/localisation/edit', [EventController::class, 'editLocalisation'])->name('localisation.edit');
    Route::post('/event/{id}/localisation/update', [EventController::class, 'updateLocalisation'])->name('localisation.update');*/
});

/*Route::controller(SettingController::class)->name('setting.')->group(function () {
    Route::get('/setting', 'index')->name('index');
    Route::get('/setting', 'create')->name('create');
    Route::get('/setting', 'destroy')->name('destroy');
    Route::get('/setting', 'update')->name('update');
    Route::get('/setting', 'edit')->name('edit');
    Route::get('/setting', 'show')->name('show');
    Route::post('/setting/store', 'store')->name('store');
});*/

/*Route::controller(LocalisationController::class)->name('localisation.')->group(function () {
    Route::get('/localisation', 'index')->name('index');
    Route::get('/localisation', 'create')->name('create');
    Route::get('/localisation', 'destroy')->name('destroy');
    Route::post('/localisation', 'update')->name('update');
    Route::get('/localisation', 'edit')->name('edit');
    Route::get('/localisation', 'show')->name('show');
    Route::post('/localisation/store', 'store')->name('store');
});*/

/*Route::controller(ImageController::class)->name('image.')->group(function () {
    Route::get('/image', 'index')->name('index');
    Route::get('/image', 'create')->name('create');
    Route::get('/image', 'destroy')->name('destroy');
    Route::get('/image', 'update')->name('update');
    Route::get('/image', 'edit')->name('edit');
    Route::get('/image', 'show')->name('show');
    Route::post('/image/store', 'store')->name('store');
});*/

/*Route::controller(CategoryController::class)->name('category.')->group(function () {
    Route::get('/categories', 'index')->name('index');
    Route::get('/category', 'create')->name('create');
    Route::get('/category', 'destroy')->name('destroy');
    Route::get('/category', 'update')->name('update');
    Route::get('/category', 'edit')->name('edit');
    Route::get('/category/{id}', 'show')->name('show');
    Route::post('/category/store', 'store')->name('store');
});*/

/*Route::controller(CategoryEventController::class)->name('categoryevent.')->group(function () {
    Route::get('/categoryevent', 'index')->name('index');
    Route::get('/categoryevent', 'create')->name('create');
    Route::get('/categoryevent', 'destroy')->name('destroy');
    Route::get('/categoryevent', 'update')->name('update');
    Route::get('/categoryevent', 'edit')->name('edit');
    Route::get('/categoryevent', 'show')->name('show');
    Route::get('/categoryevent/store', 'store')->name('store');
});*/

Route::get('/politique-de-confidentialite', function () {
    return view('politique-de-confidentialite');
})->name('politique-de-confidentialite');

Route::get('/mentions-legales', function () {
    return view('mentions-legales');
})->name('mentions-legales');
