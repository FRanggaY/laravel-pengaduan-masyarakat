<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});


// LOGIN LOGOUT
Route::get('/login',  [App\Http\Controllers\authController::class, 'index']);
Route::post('/login',  [App\Http\Controllers\authController::class, 'login'])->name('login');
Route::post('/logout',  [App\Http\Controllers\authController::class, 'logout']);


// Masyarakat | Tidak perlu login
Route::group(['middleware' => ['is_login_false']], function () {
    Route::get('/pengaduan', [App\Http\Controllers\pengaduanController::class, 'homeindex']);
    Route::post('/pengaduan', [App\Http\Controllers\pengaduanController::class, 'store']);
});

// Perlu Login
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\dashboardController::class, 'index']);
    Route::get('/settings', [App\Http\Controllers\dashboardController::class, 'settingsIndex']);
    Route::put('/change-password', [App\Http\Controllers\dashboardController::class, 'updatePassword']);

    Route::get('/access/pengaduan', [App\Http\Controllers\pengaduanController::class, 'index']);
    Route::get('/access/pengaduan/{id}', [App\Http\Controllers\pengaduanController::class, 'detail']);
    // Route::put('/access/pengaduan/update/{id}', [App\Http\Controllers\pengaduanController::class, 'updateStatus']);
    Route::get('/access/pengaduan/delete/{id}', [App\Http\Controllers\pengaduanController::class, 'destroy']);

    // Hak Akses Petugas
    Route::group(['middleware' => ['cek_level:petugas']], function () {
        Route::put('/access/pengaduan/update/{id}', [App\Http\Controllers\pengaduanController::class, 'updateStatus']);
    });

    // Hak Akses Admin
    Route::group(['middleware' => ['cek_level:admin']], function () {

        Route::get('/access/pengaduan/print/{id}', [App\Http\Controllers\pengaduanController::class, 'print']);

        Route::get('/access/users', [App\Http\Controllers\usersController::class, 'index']);
        Route::post('/access/users/add', [App\Http\Controllers\usersController::class, 'store']);
        Route::get('/access/users/edit/{id}', [App\Http\Controllers\usersController::class, 'edit']);
        Route::put('/access/users/update/{id}', [App\Http\Controllers\usersController::class, 'update']);
        Route::get('/access/users/delete/{id}', [App\Http\Controllers\usersController::class, 'destroy']);

        Route::get('/access/masyarakats', [App\Http\Controllers\masyarakatController::class, 'index']);
        Route::post('/access/masyarakats/add', [App\Http\Controllers\masyarakatController::class, 'store']);
        Route::get('/access/masyarakats/edit/{id}', [App\Http\Controllers\masyarakatController::class, 'edit']);
        Route::put('/access/masyarakats/update/{id}', [App\Http\Controllers\masyarakatController::class, 'update']);
        Route::get('/access/masyarakats/delete/{id}', [App\Http\Controllers\masyarakatController::class, 'destroy']);
    });
});





