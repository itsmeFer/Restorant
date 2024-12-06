<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('menus', MenuController::class);
Route::resource('orders', OrderController::class);
Route::resource('tables', TableController::class);

Route::get('/menus', [MenuController::class, 'index'])->name('menus.index'); // Admin view for menu

Route::get('/tables', [TableController::class, 'index'])->name('tables.index');
Route::get('/reservations/menus', [ReservationController::class, 'selectMenus'])->name('reservations.menus'); // Customer view for menu
Route::get('/reservations/tables', [ReservationController::class, 'selectTable'])->name('reservations.tables');
Route::post('/reservations/confirm', [ReservationController::class, 'confirmReservation'])->name('reservations.confirm');
