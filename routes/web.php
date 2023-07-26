<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RaporController;
use App\Http\Controllers\IjazahController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\MenuHasilController;
use App\Http\Controllers\AdminRaporController;
use App\Http\Controllers\JarakRumahController;
use App\Http\Controllers\AdminIjazahController;
use App\Http\Controllers\AdminPesertaController;
use App\Http\Controllers\AdminDataSiswaController;
use App\Http\Controllers\AdminMenuHasilController;
use App\Http\Controllers\InputDataSiswaController;
use App\Http\Controllers\AdminJarakRumahController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');


//Login
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);


//Registrasi
Route::get('/register', [RegisterController::class,'index'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store']);

//dashboard
Route::resource('/dashboard/peserta',AdminPesertaController::class);
// Dashboard Ijazah
Route::resource('/dashboard/ijazah',AdminIjazahController::class);
// Dashboard Jarak Rumah
Route::resource('/dashboard/jarak_rumah',AdminJarakRumahController::class);
// Dashboard Data Siswa
Route::resource('/dashboard/data_siswa',AdminDataSiswaController::class);
// Dashboard Menu Hasil
Route::resource('/dashboard/kelulusan',AdminMenuHasilController::class);
// DasboardRapor
Route::resource('/dashboard/rapor',AdminRaporController::class);


// Ijazah
Route::resource('/ijazah',IjazahController::class);

// Jarak Rumah
Route::resource('/jarak_rumah',JarakRumahController::class);

// Data Siswa
Route::resource('/data_siswa',DataSiswaController::class);

// Menu Hasil
Route::resource('/menu_hasil',MenuHasilController::class);

// Rapor
Route::resource('/rapor',RaporController::class);

Route::post('data-siswa', [InputDataSiswaController::class,'create']);
