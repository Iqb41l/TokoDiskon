<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\PurchaseController;

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


Route::get('/', [PurchaseController::class, 'create'])->name('index');
Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchases.store');
Route::get('/vouchers', [VoucherController::class, 'index'])->name('vouchers.index');
Route::get('/vouchers/{voucher}', [VoucherController::class, 'show'])->name('vouchers.show');
Route::post('/vouchers/{voucher}/use', [VoucherController::class, 'useVoucher'])->name('vouchers.useVoucher');
Route::post('/vouchers/search', [VoucherController::class, 'search'])->name('vouchers.search');
