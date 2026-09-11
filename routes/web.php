<?php
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/produk', function () {
    return view('produk');
});

Route::get('/tipe-spesial', function () {
    return view('tipe_spesial');
});

Route::get('/cetak-barcode', function () {
    return view('cetak_barcode');
});

Route::get('/meja-kamar', function () {
    return view('meja_kamar');
});

Route::get('/inventori-stok', function () {
    return view('inventori_stok');
});

Route::get('/penjualan', function () {
    return view('penjualan');
});

Route::get('/informasi-outlet', function () {
    return view('informasi_outlet');
});

Route::get('/pengaturan-pos', function () {
    return view('pengaturan_pos');
});

Route::get('/lisensi', function () {
    return view('lisensi');
});

Route::get('/login', function () {
    return view('login');
});
