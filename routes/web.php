<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeahlianController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PengalamanKerjaController;
use App\Http\Controllers\ProfilCvController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);

Route::resource('matakuliah', MatakuliahController::class)->except(['show']);

Route::get('/home', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('pelanggan', PelangganController::class);

Route::get('/cv', [CVController::class, 'index'])->name('cv.index');
Route::post('/cv/profil', [ProfilCvController::class, 'store'])->name('cv.profil.store');
Route::put('/cv/profil/{profilCv}', [ProfilCvController::class, 'update'])->name('cv.profil.update');
Route::delete('/cv/profil/{profilCv}', [ProfilCvController::class, 'destroy'])->name('cv.profil.destroy');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('keahlian', KeahlianController::class)->except(['show']);
    Route::resource('pengalaman-kerja', PengalamanKerjaController::class)->except(['show']);
});
