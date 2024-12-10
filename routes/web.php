<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\DashoboardController;
use App\Http\Controllers\PemeesananController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', function () {
    return view('home');
});

Route::get('/akun', [AkunController::class, 'index'])->name('akun');
Route::post('/logout', [AkunController::class, 'logout'])->name('akun.logout');
Route::post('/akun', [AkunController::class, 'store'])->name('akun.store');
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/event', [EventController::class, 'index']);
Route::get('/fasilitas', [FasilitasController::class, 'index']);
Route::get('/galeri', [GaleriController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/sejarah', [SejarahController::class, 'index']);
Route::get('/tiket', [TiketController::class, 'index'])->name('tiket');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authentifikasi'])->name('login.authentifikasi');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/dashboard', [DashoboardController::class, 'index']);
Route::get('/info', [InfoController::class, 'index'])->name('info');
Route::post('/info', [InfoController::class, 'accept'])->name('info.accept');
Route::get('/pemesanan', [PemeesananController::class, 'index'])->name('pemesanan');
Route::post('/pemesanan', [PemeesananController::class, 'buy'])->name('pemesanan.buy');
Route::get('/forgot', [ForgotController::class, 'index']);
Route::post('/forget', [ForgotController::class, 'sendResetLinkEmail'])->name('forgot.forget');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::post('/transfer', [TiketController::class, 'transfer'])->name('tiket.transfer');
Route::get('/payment/{pemesanan_id}', [TiketController::class, 'payment'])->name('tiket.payment');
Route::post('/payment/bayar', [TiketController::class, 'pembayaran'])->name('payment.bayar');
