<?php

use App\Http\Controllers\CargoController;

use App\Http\Controllers\CityController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\RegisterController;

use App\Http\Controllers\LoginController;

use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::prefix('register')->group(function() {

    Route::get('user', [RegisterController::class, 'indexUser'])->middleware('guest')->name('register.user');

    Route::post('user', [RegisterController::class, 'storeUser'])->middleware('guest')->name('register.store.user');

    Route::get('company', [RegisterController::class, 'indexCompany'])->middleware('guest')->name('register.company');

    Route::post('company', [RegisterController::class, 'storeCompany'])->middleware('guest')->name('register.store.company');

    Route::get('select', [RegisterController::class, 'select'])->middleware('guest')->name('register.select');

});

Route::prefix('login')->group(function() {

    Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');

    Route::post('/', [LoginController::class, 'store'])->middleware('guest')->name('login.store');

});

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');


Route::get('/cargo', [CargoController::class, 'index'])->name('cargo.index');

Route::get('cargo/create', [CargoController::class, 'create'])->middleware('auth')->name('cargo.create');

Route::post('cargo', [CargoController::class, 'store'])->name('cargo.store');

Route::get('cargo/{id}', [CargoController::class, 'show'])->name('cargo.show');

Route::get('get/cities', [CityController::class, 'index'])->name('get.cities');