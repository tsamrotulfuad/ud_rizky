<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;

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

Route::get('/login', function () {
    return view('login');
});

//Route Kasir
Route::get('/kasir', function () {
    return view('kasir/app');
});

//Route Admin
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('kodeProduk', [ProdukController::class, 'kodeProduk'])->name('produk.kode');
Route::get('selectKategori', [ProdukController::class, 'kategori'])->name('produk.kategori');
Route::get('selectSupplier', [ProdukController::class, 'supplier'])->name('produk.supplier');

Route::resource('produk', ProdukController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('supplier', SupplierController::class);



