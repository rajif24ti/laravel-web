<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;

use App\Http\Controllers\MatakuliahController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\QuestionController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\PelangganController;

use App\Http\Controllers\UserController;

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Hallo Mahasiswa';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'Nim saya: '.$param1;
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
});


//LATIHAN

Route::get('/mkindex', [MatakuliahController::class, 'index']);
Route::get('/mkcreate', [MatakuliahController::class, 'create']);
Route::get('/mkstore', [MatakuliahController::class, 'store']);
Route::get('/mkshow', [MatakuliahController::class, 'show']);
Route::get('/mkedit', [MatakuliahController::class, 'edit']);
Route::get('/mkupdate', [MatakuliahController::class, 'update']);
Route::get('/mkdestroy', [MatakuliahController::class, 'destroy']);

Route::get('/matakuliah/show/{id?}', [MatakuliahController::class, 'show']);

Route::get('/home', [HomeController::class, 'index']);

//-------------------------------------------------------------------------------------------------------
Route::post('question/store', [QuestionController::class, 'store'])
        ->name('question.store');

Route::get('/home', function () {
    return view('home');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('pelanggan', PelangganController::class);


Route::resource('user', UserController::class);

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// ;

