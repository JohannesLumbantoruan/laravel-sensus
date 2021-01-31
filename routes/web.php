<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SensusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginAksi'])->name('loginAksi');
Route::middleware('auth:admin')->group(function()
{
    Route::get('/ganti_password', [LoginController::class, 'gantiPassword'])->name('gantiPassword');
    Route::put('/ganti_password_aksi', [LoginController::class, 'gantiPasswordAksi'])->name('gantiPasswordAksi');
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/warga', [SensusController::class, 'warga'])->name('warga');
    Route::get('/warga/cari', [SensusController::class, 'cariWarga'])->name('cariWarga');
    Route::get('/warga/tambah', [SensusController::class, 'tambahWarga'])->name('tambahWarga');
    Route::post('/warga/tambah_aksi', [SensusController::class, 'tambahWargaAksi'])->name('tambahWargaAksi');
    Route::get('/warga/edit/{id}', [SensusController::class, 'editWarga'])->name('editWarga');
    Route::put('/warga/edit_aksi/{id}', [SensusController::class, 'editWargaAksi'])->name('editWargaAksi');
    Route::get('/warga/hapus/{id}', [SensusController::class, 'hapusWarga'])->name('hapusWarga');
    Route::get('/desa', [SensusController::class, 'desa'])->name('desa');
    Route::get('/desa/cari', [SensusController::class, 'cariDesa'])->name('cariDesa');
    Route::get('/desa/tambah', [SensusController::class, 'tambahDesa'])->name('tambahDesa');
    Route::post('/desa/tambah_aksi', [SensusController::class, 'tambahDesaAksi'])->name('tambahDesaAksi');
    Route::get('/desa/edit/{id}', [SensusController::class, 'editDesa'])->name('editDesa');
    Route::put('/desa/edit_aksi/{id}', [SensusController::class, 'editDesaAksi'])->name('editDesaAksi');
    Route::get('/desa/hapus/{id}', [SensusController::class, 'hapusDesa'])->name('hapusDesa');
    Route::get('/dusun', [SensusController::class, 'dusun'])->name('dusun');
    Route::get('/dusun/cari', [SensusController::class, 'cariDusun'])->name('cariDusun');
    Route::get('/dusun/tambah', [SensusController::class, 'tambahDusun'])->name('tambahDusun');
    Route::post('/dusun/tambah_aksi', [SensusController::class, 'tambahDusunAksi'])->name('tambahDusunAksi');
    Route::get('/dusun/edit/{id}', [SensusController::class, 'editDusun'])->name('editDusun');
    Route::put('/dusun/edit_aksi/{id}', [SensusController::class, 'editDusunAksi'])->name('editDusunAksi');
    Route::get('/dusun/hapus/{id}', [SensusController::class, 'hapusDusun'])->name('hapusDusun');
    Route::get('/dusun/ajax/{id}', [SensusController::class, 'ajaxDusun'])->name('ajaxDusun');
});