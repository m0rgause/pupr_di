<?php

use App\Http\Controllers\Admin\AsesmenController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\LantaiController;
use App\Http\Controllers\Admin\RuangController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\isAuth;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(isAuth::class);

Route::get('/floor/{id}', [HomeController::class, 'floor'])->name('floor')->middleware(isAuth::class);
Route::get('/menu', [HomeController::class, 'getMenu'])->name('menu')->middleware(isAuth::class);

Route::get('/signin', [AuthController::class, 'signIn'])->name('signin');
Route::post('/signin', [AuthController::class, 'authenticate'])->name('signin');

Route::prefix('admin')->middleware(isAuth::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('lantai')->group(function () {
        Route::get('/', [LantaiController::class, 'index'])->name('admin.lantai');
        Route::get('/tambah', [LantaiController::class, 'create'])->name('admin.lantai.create');
        Route::post('/tambah', [LantaiController::class, 'store'])->name('admin.lantai.create');
        Route::get('/edit/{id}', [LantaiController::class, 'edit'])->name('admin.lantai.edit');
        Route::post('/edit/{id}', [LantaiController::class, 'update'])->name('admin.lantai.edit');
        Route::get('/hapus/{id}', [LantaiController::class, 'destroy'])->name('admin.lantai.hapus');
    });

    Route::prefix('ruang')->group(function () {
        Route::get('/', [RuangController::class, 'index'])->name('admin.ruang');
        Route::get('/tambah', [RuangController::class, 'create'])->name('admin.ruang.create');
        Route::post('/tambah', [RuangController::class, 'store'])->name('admin.ruang.create');
        Route::get('/edit/{id}', [RuangController::class, 'edit'])->name('admin.ruang.edit');
        Route::post('/edit/{id}', [RuangController::class, 'update'])->name('admin.ruang.edit');
        Route::get('/hapus/{id}', [RuangController::class, 'destroy'])->name('admin.ruang.hapus');
    });

    Route::prefix('asesmen')->group(function () {
        Route::get('/', [AsesmenController::class, 'index'])->name('admin.asesmen');
        Route::get('/tambah', [AsesmenController::class, 'create'])->name('admin.asesmen.create');
        Route::post('/tambah', [AsesmenController::class, 'store'])->name('admin.asesmen.create');
        Route::get('/edit/{id}', [AsesmenController::class, 'edit'])->name('admin.asesmen.edit');
        Route::post('/edit/{id}', [AsesmenController::class, 'update'])->name('admin.asesmen.edit');
        Route::delete('/hapus/{id}', [AsesmenController::class, 'destroy'])->name('admin.asesmen.hapus');
    });

    Route::prefix('jadwal')->group(function () {
        Route::get('/', [JadwalController::class, 'index'])->name('admin.jadwal');
        Route::get('/tambah', [JadwalController::class, 'create'])->name('admin.jadwal.create');
        Route::post('/tambah', [JadwalController::class, 'store'])->name('admin.jadwal.create');
        Route::get('/edit/{id}', [JadwalController::class, 'edit'])->name('admin.jadwal.edit');
        Route::post('/edit/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.edit');
        Route::delete('/hapus/{id}', [JadwalController::class, 'destroy'])->name('admin.jadwal.hapus');
    });

    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin.setting');
        Route::post('/', [SettingController::class, 'update'])->name('admin.setting');
    });

    Route::get('/signout', [AuthController::class, 'signOut'])->name('signout');
});
