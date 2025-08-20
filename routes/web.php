<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'view'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('auth');
Route::get('/register', [LoginController::class, 'viewregis'])->name('register');
Route::post('/register', [LoginController::class, 'SignIn'])->name('SignIn');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['user'])->group(function() {
    Route::get('/', [UserController::class, 'view'])->name('homepage');
    Route::get('/finished/{id}', [TaskController::class, 'finished'])->name('finished');
    Route::get('/task/finished', [UserController::class, 'finishedview'])->name('finished-view');
    Route::get('/deleted/{id}', [TaskController::class, 'deleted'])->name('deleted');
    Route::post('/create', [TaskController::class, 'create'])->name('create');
    Route::get('/pinned/{id}', [TaskController::class, 'pinned'])->name('pinned');

});
