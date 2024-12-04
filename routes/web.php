<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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


Route::get('/tables', [TableController::class, 'index'])->name('tables.index');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
Route::get('/tables', [TableController::class, 'index'])->name('tables.index');
