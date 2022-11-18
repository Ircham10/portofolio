<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KontakController;

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
// Route::get('/about', function () {
// return view('about');
// });
// Route::get('/contact', function () {
//     return view('contact');
// });
// Route::get('/', function () {
//     return view('/admin.app');
// });
Route::get('//', [Dashboardcontroller::class,'home']);
Route::get('mastersiswa/{id_siswa}/hapus', [SiswaController::class,'hapus'])->name('mastersiswa.hapus');
Route::resource('/masterproject', ProjectController::class);
Route::resource('/mastersiswa', SiswaController::class);
Route::resource('/masterkontak', KontakController::class);
Route::get('/profil', [ProfilController::class,'index']);
// Route::e('/tambahkontak', [KontakController::class,'create']);


