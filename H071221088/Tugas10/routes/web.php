<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;

Route::get('/', [PagesController::class, 'index'])->name('home');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'process_register']);

Route::post('/login', [AuthController::class, 'process_login'])->name('login');

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'E-learn'], function () {

    Route::get('/admin/kelas/create', [AdminController::class, 'createKelasForm'])->name('admin.kelas.create');
    Route::post('/admin/kelas/create', [AdminController::class, 'storeKelas'])->name('admin.kelas.store');
    Route::get('/admin/kelas/edit/{nama}', [AdminController::class, 'editKelasForm'])->name('admin.kelas.edit');
    Route::put('/admin/kelas/update/{nama}', [AdminController::class, 'updateKelas'])->name('admin.kelas.update');
    Route::delete('/admin/kelas/delete', [AdminController::class, 'deleteKelas'])->name('admin.kelas.delete');
    Route::delete('/admin/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');

    Route::get('/admin/backpage', [AdminController::class, 'backpage'])->name('backpage');

    Route::get('/student',[PagesController::class, 'studentpage']);
    Route::get('/student/kelas/{namaKelas}', [KelasController::class, 'show'])->name('kelas.show');
    Route::post('/student/kelas/{namaKelas}/comment', [KelasController::class, 'addComment'])->name('kelas.addComment');
    Route::get('/student/kelas/{namaKelas}', [KelasController::class, 'show'])->name('kelas.show');

    Route::get('/student/kelas', [PagesController::class, 'halamankelas'])->name('konten.kelas');
    Route::get('/student/home', [PagesController::class, 'pageberanda'])->name('homepage');

    Route::group(['middleware' => ['prevent-back']], function () {
        Route::get('/admin', [PagesController::class, 'adminpage'])->name('adminpage');
        Route::post('/admin', [AdminController::class, 'index']);
        Route::get('/admin', [PagesController::class, 'adminpage'])->name('adminpage');
        Route::get('/student',[PagesController::class, 'studentpage']);
    });
});

Route::post('/', [AuthController::class, 'logout'])->name('logout');
