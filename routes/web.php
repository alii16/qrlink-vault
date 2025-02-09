<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;


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

Route::controller(QRCodeController::class)->group(function () {
    Route::get('/qrcode', [QRCodeController::class, 'index']);
    Route::post('generate-qr-code', 'generateQrCode')->name('generate-qr-code');
});

Route::get('/download-qr/{filename}', [QRCodeController::class, 'downloadQrCode'])->name('download-qr');

Route::get('/scan', function () {
    return view('scan');
});

Route::get('/history', [QRCodeController::class, 'history'])->name('history');
