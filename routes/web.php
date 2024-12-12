<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard untuk pengguna yang sudah terverifikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    // Rute untuk profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Resource controllers
Route::resource('menus', MenuController::class); // CRUD untuk menu
Route::resource('orders', OrderController::class); // CRUD untuk pesanan
Route::resource('tables', TableController::class); // CRUD untuk meja

// Rute khusus untuk reservasi
Route::prefix('reservations')->name('reservations.')->group(function () {
    Route::get('/', [ReservationController::class, 'index'])->name('index'); // Daftar reservasi
    Route::get('/menus', [ReservationController::class, 'selectMenus'])->name('menus'); // Pilih menu
    Route::post('/select-table', [ReservationController::class, 'selectTable'])->name('selectTable'); // Pilih meja
    Route::post('/confirm', [ReservationController::class, 'confirmReservation'])->name('confirm'); // Konfirmasi reservasi
});

// Rute khusus untuk meja
Route::prefix('tables')->name('tables.')->group(function () {
    Route::get('/', [TableController::class, 'index'])->name('index'); // Daftar meja
    Route::post('/select', [TableController::class, 'selectTable'])->name('select'); // Pilih meja tertentu
});
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
Route::post('/reservations/confirm', [ReservationController::class, 'confirmReservation'])->name('reservations.confirm');

Route::resource('reservations', ReservationController::class);

// Rute untuk menyelesaikan reservasi
Route::put('reservations/{reservation}/complete', [ReservationController::class, 'complete'])->name('reservations.complete');

// Rute untuk menghapus reservasi
Route::delete('reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

Route::get('reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');

// Rute untuk reservasi
Route::resource('reservations', ReservationController::class);

// Menandai reservasi selesai dan mengarahkan ke pembayaran
Route::put('reservations/{reservation}/complete', [ReservationController::class, 'complete'])->name('reservations.complete');

// Halaman pembayaran
Route::get('reservations/{reservation}/payment', [ReservationController::class, 'payment'])->name('reservations.payment');

// Proses pembayaran
Route::post('reservations/{reservation}/payment', [ReservationController::class, 'processPayment'])->name('reservations.payment.process');

// Route untuk memilih metode pembayaran
Route::get('reservations/{reservation}/payment', [ReservationController::class, 'showPaymentForm'])->name('reservations.payment');

// Route untuk mengonfirmasi pembayaran
Route::post('reservations/{reservation}/payment', [ReservationController::class, 'processPayment'])->name('reservations.processPayment');
Route::get('/reservations/{reservation}/payment', [ReservationController::class, 'showPaymentForm'])->name('reservations.payment');
Route::post('/reservations/{reservation}/payment', [ReservationController::class, 'processPayment'])->name('reservations.processPayment');
Route::get('/reservations/{reservation}/payment', [ReservationController::class, 'showPaymentForm'])->name('reservations.payment');
