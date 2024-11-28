<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\DetailPengadaanController;
use App\Http\Controllers\MarginPenjualanController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailReturController;
use App\Http\Controllers\DetailPenjualanController;
use app\Http\Controllers\KartuStokController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Database
Route::get('/buat/database', [DatabaseController::class, 'create_database']);
Route::get('/buat/tabel', [DatabaseController::class, 'create_table']);
Route::get('/isi/data', [DatabaseController::class, 'insert_data']);

// ROLE
Route::get('/role/index', [RoleController::class, 'index'])->name('role/index');
Route::post('/role/simpan', [RoleController::class, 'save']);
Route::get('/role/edit/{id}', [RoleController::class, 'edit']);
Route::post('/role/update/{id}', [RoleController::class, 'update']);
Route::get('/role/delete/{id}', [RoleController::class, 'delete']);

// USER
Route::get('/user/index', [UserController::class, 'index'])->name('user/index');
Route::post('/user/simpan', [UserController::class, 'save']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);

// VENDOR
Route::get('/vendor/index', [VendorController::class, 'index'])->name('vendor/index');
Route::post('/vendor/simpan', [VendorController::class, 'save']);
Route::get('/vendor/edit/{id}', [VendorController::class, 'edit']);
Route::post('/vendor/update/{id}', [VendorController::class, 'update']);
Route::get('/vendor/delete/{id}', [VendorController::class, 'delete']);

// SATUAN
Route::get('/satuan/index', [SatuanController::class, 'index'])->name('satuan/index');
Route::post('/satuan/simpan', [SatuanController::class, 'save']);
Route::get('/satuan/edit/{id}', [SatuanController::class, 'edit']);
Route::post('/satuan/update/{id}', [SatuanController::class, 'update']);
Route::get('/satuan/delete/{id}', [SatuanController::class, 'delete']);

// BARANG
Route::get('/barang/index', [BarangController::class, 'index'])->name('barang/index');
Route::post('/barang/simpan', [BarangController::class, 'save']);
Route::get('/barang/edit/{id}', [BarangController::class, 'edit']);
Route::post('/barang/update/{id}', [BarangController::class, 'update']);
Route::get('/barang/delete/{id}', [BarangController::class, 'delete']);

// MARGIN PENJUALAN
Route::get('/margin-penjualan/index', [MarginPenjualanController::class, 'index'])->name('margin-penjualan/index');
Route::post('/margin-penjualan/simpan', [MarginPenjualanController::class, 'save']);
Route::get('/margin-penjualan/edit/{id}', [MarginPenjualanController::class, 'edit']);
Route::post('/margin-penjualan/update/{id}', [MarginPenjualanController::class, 'update']);
Route::get('/margin-penjualan/delete/{id}', [MarginPenjualanController::class, 'delete']);

// PENGADAAN
Route::get('/pengadaan/index', [PengadaanController::class, 'index'])->name('pengadaan/index');
Route::post('/pengadaan/simpan', [PengadaanController::class, 'save']);
Route::get('/pengadaan/edit/{id}', [PengadaanController::class, 'edit']);
Route::post('/pengadaan/update/{id}', [PengadaanController::class, 'update']);
Route::get('/pengadaan/delete/{id}', [PengadaanController::class, 'delete']);

// DETAIL PENGADAAN
Route::get('/detail-pengadaan/index', [DetailPengadaanController::class, 'index'])->name('detail-pengadaan/index');
Route::post('/detail-pengadaan/simpan', [DetailPengadaanController::class, 'save']);
Route::get('/detail-pengadaan/edit/{id}', [DetailPengadaanController::class, 'edit']);
Route::post('/detail-pengadaan/update/{id}', [DetailPengadaanController::class, 'update']);
Route::get('/detail-pengadaan/delete/{id}', [DetailPengadaanController::class, 'delete']);


// RETUR
Route::get('/retur/index', [ReturController::class, 'index'])->name('retur/index');
Route::post('/retur/simpan', [ReturController::class, 'save']);
Route::get('/retur/edit/{id}', [ReturController::class, 'edit']);
Route::post('/retur/update/{id}', [ReturController::class, 'update']);
Route::get('/retur/delete/{id}', [ReturController::class, 'delete']);

// PENERIMAAN
Route::get('/penerimaan/index', [PenerimaanController::class, 'index'])->name('penerimaan/index');
Route::post('/penerimaan/simpan', [PenerimaanController::class, 'save']);
Route::get('/penerimaan/edit/{id}', [PenerimaanController::class, 'edit']);
Route::post('/penerimaan/update/{id}', [PenerimaanController::class, 'update']);
Route::get('/penerimaan/delete/{id}', [PenerimaanController::class, 'delete']);


// PENJUALAN
Route::get('/penjualan/index', [PenjualanController::class, 'index'])->name('penjualan/index');
Route::post('/penjualan/simpan', [PenjualanController::class, 'save']);
Route::get('/penjualan/edit/{id}', [PenjualanController::class, 'edit']);
Route::post('/penjualan/update/{id}', [PenjualanController::class, 'update']);
Route::get('/penjualan/delete/{id}', [PenjualanController::class, 'delete']);

// DETAIL RETUR
Route::get('/detail_retur/index', [DetailReturController::class, 'index'])->name('detail_retur/index');
Route::post('/detail_retur/simpan', [DetailReturController::class, 'save']);
Route::get('/detail_retur/edit/{id}', [DetailReturController::class, 'edit']);
Route::post('/detail_retur/update/{id}', [DetailReturController::class, 'update']);
Route::get('/detail_retur/delete/{id}', [DetailReturController::class, 'delete']);

// DETAIL PENJUALAN
Route::get('/detail_penjualan/index', [DetailPenjualanController::class, 'index'])->name('detail_penjualan/index');
Route::post('/detail_penjualan/simpan', [DetailPenjualanController::class, 'save']);
Route::get('/detail_penjualan/edit/{id}', [DetailPenjualanController::class, 'edit']);
Route::post('/detail_penjualan/update/{id}', [DetailPenjualanController::class, 'update']);
Route::get('/detail_penjualan/delete/{id}', [DetailPenjualanController::class, 'delete']);

// KARTU STOK
Route::get('/kartu_stok/index', [KartuStokController::class, 'index'])->name('kartu_stok/index');
Route::get('/kartu_stok/show/{id}', [KartuStokController::class, 'show'])->name('kartu_stok/show');

//Data Tabel
Route::get('/DataTabel', Function(){
    return view('datatable');
});
