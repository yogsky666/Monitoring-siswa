<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntrospeksiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Auth routes (gunakan auth bawaan Laravel)
Auth::routes();

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('dashboard');

// Kelas
Route::get('/kelas', [KelasController::class, 'index'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('kelas');

// Sanksi
Route::get('/sanksi', [SanksiController::class, 'index'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('sanksi');

// Introspeksi
Route::get('/introspeksi', [IntrospeksiController::class, 'index'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('introspeksi');

// Siswa
Route::get('/siswa', [SiswaController::class, 'index'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('siswa.index');
Route::get('/inputsiswa', [SiswaController::class, 'create'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('siswa.store');
Route::get('/siswa/{nisn}', [SiswaController::class, 'show'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('siswa.show');

// Pelanggaran
Route::get('/pelanggaran', [PelanggaranController::class, 'index'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('pelanggaran.index');
Route::get('/inputpelanggaran', [PelanggaranController::class, 'create'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('pelanggaran.create');
Route::post('/pelanggaran', [PelanggaranController::class, 'store'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('pelanggaran.store');
Route::get('/pelanggaran/{nisn}', [SiswaController::class, 'show'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('pelanggaran.show');
Route::delete('/pelanggaran/{id}', [PelanggaranController::class, 'destroy'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('pelanggaran.destroy');

// Bimbingan
Route::get('/bimbingan', [BimbinganController::class, 'index'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('bimbingan.index');
Route::get('/inputbimbingan', [BimbinganController::class, 'create'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('bimbingan.create');
Route::post('/bimbingan', [BimbinganController::class, 'store'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('bimbingan.store');
Route::get('/bimbingan/{nisn}', [BimbinganController::class, 'show'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('bimbingan.show');
Route::delete('/bimbingan/{id}', [BimbinganController::class, 'destroy'])
    ->middleware(['auth', 'checklevel:admin,guru'])
    ->name('bimbingan.destroy');
