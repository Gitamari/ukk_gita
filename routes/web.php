<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



Route::middleware(['guest'])->group(function () {
    // login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/post', [LoginController::class, 'postlogin'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register/post', [RegisterController::class, 'postregister'])->name('register.submit');
});

Route::middleware(['auth'])->group(function() {

    Route::prefix('/dashboard')->group(function() {

        // dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // sort album
        Route::get('/sort/{album_id}', [DashboardController::class, 'sort'])->name('dashboard.sort');

        // fetch foto
        Route::get('/foto', [FotoController::class, 'index'])->name('foto');
        // post route for photo
        Route::post('/foto/post', [FotoController::class, 'post'])->name('foto.post');
        // delete photo
        Route::delete('/delete-photo/{id}', [FotoController::class, 'delete'])->name('delete.potos');
        // add or remove like
        Route::post('/like/{id}', [FotoController::class, 'like'])->name('like');
        // fetch komentar
        Route::get('/komentar/{id}',[KomentarController::class, 'index'])->name('komentar');
        // tambah komentar
        Route::post('/tambah-komentar', [KomentarController::class, 'post'])->name('tambah.komentar');
        // album
        Route::get('/album', [AlbumController::class, 'index'])->name('album');
        Route::post('/album/post', [AlbumController::class, 'store'])->name('album.store');

    });
});



Route::get('/', [GuestController::class, 'index'])->name('guest');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
