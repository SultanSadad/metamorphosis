<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\webController;
use App\Http\Controllers\adminController;

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

Route::get('/', [webController::class, 'index']);
Route::get('/Login', [webController::class, 'Login']);
Route::post('/Login', [webController::class, 'Autentikasi'])->name('login');
Route::get('/Register', [webController::class, 'Register']);

// Customer
Route::prefix('guest')->group(function () {
    Route::get('/Register', [webController::class, 'Register']);
    Route::post('/logout', [WebController::class, 'logout'])->name('logout');
    Route::post('/create', [webController::class, 'create']);
    Route::get('/Profile', [webController::class, 'Profile']);
    Route::get('/AboutUs', [webController::class, 'AboutUs']);
    Route::get('/Privacy', [webController::class, 'Privacy']);
    Route::get('/indexguest', [webController::class, 'indexguest']);
    Route::get('/status', [webController::class, 'status']);
    Route::post('/accept-order/{orderId}', [webController::class, 'acceptOrder'])->name('order.accept');
    Route::post('/reject-order/{orderId}', [webController::class, 'rejectOrder'])->name('order.reject');
    Route::get('/Notifikasi', [webController::class, 'Notifikasi'])->name('notifikasi');
    Route::get('/review/{orderId}', [webController::class, 'reviewForm'])->name('review');
    Route::post('/review/{orderId}', [webController::class, 'submitReview'])->name('review.submit');
    Route::get('/Keranjang', [webController::class, 'showKeranjang'])->name('keranjang.show');
    Route::post('/keranjang', [webController::class, 'addToKeranjang'])->name('keranjang.add');
    Route::post('/pesan', [webController::class, 'pesan']);
    Route::post('/keranjang/hapus', [webController::class, 'hapusKeranjang'])->name('keranjang.hapus');
    Route::get('/DetailBarang/{id}', [webController::class, 'DetailBarang'])->name('DetailBarang');
    Route::get('/Bantuan', [webController::class, 'Bantuan']);
    Route::post('/pembayaran', [WebController::class, 'Pembayaran'])->name('pembayaran.store');
    Route::get('guest/download-pdf/{id_pembayaran}', [WebController::class, 'downloadPDF'])->name('guest.download-pdf');
    Route::get('/pdf', [WebController::class, 'View_pdf']);
    Route::get('/Adidas', [webController::class, 'Adidas']);
    Route::get('/Nike', [webController::class, 'Nike']);
    Route::get('/Converse', [webController::class, 'Converse']);
    Route::get('/NewBalance', [webController::class, 'NewBalance']);
    Route::get('/OnitsukaTiger', [webController::class, 'OnitsukaTiger']);
    Route::get('/Vans', [webController::class, 'Vans']);
});

// Admin
Route::prefix('admin')->middleware('checkrole:admin')->group(function () {
    Route::get('/Dashboard', [AdminController::class, 'Dashboard']);
    Route::get('/AdminKonfirmasi', [AdminController::class, 'AdminKonfirmasi']);
    Route::get('/Barang', [AdminController::class, 'Barang']);
    Route::get('/DataCustomer', [AdminController::class, 'DataCustomer']);
    Route::get('/DaftarBarang', [AdminController::class, 'DaftarBarang']);
    Route::get('/DaftarAdmin', [AdminController::class, 'DaftarAdmin']);
    Route::get('/Review', [AdminController::class, 'Review']);
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::post('/konfirmasi-pembayaran', [AdminController::class, 'konfirmasiPembayaran'])->name('admin.konfirmasiPembayaran');
    Route::post('/tolak-pembayaran', [AdminController::class, 'tolakPembayaran'])->name('admin.tolakPembayaran');
});
