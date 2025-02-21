<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\ProfileController;


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
    return view('index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(QRCodeController::class)->group(function () {
    Route::get('/qrcode', [QRCodeController::class, 'index']);
    Route::post('generate-qr-code', 'generateQrCode')->name('generate-qr-code');
});

Route::get('/download-qr/{filename}', [QRCodeController::class, 'downloadQrCode'])->name('download-qr');

Route::get('/scanner', function () {
    return view('scanner');
});

Route::get('/history', [QRCodeController::class, 'history'])->name('history');

Route::get('history/clear', [QRCodeController::class, 'clearHistory'])->name('history.clear');

Route::get('/captcha-image', [CaptchaController::class, 'getCaptchaImage'])->name('captcha.image');

require __DIR__.'/auth.php';
