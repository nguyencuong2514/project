<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.index');
});
Route::get('/', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/show/{id}', [ClientController::class, 'show'])->name('client.show');
Route::get('/client/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/client/register', [AuthController::class, 'register'])->name('register');
Route::get('/client/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/client/login', [AuthController::class, 'login']);
Route::post('/client/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/client/create', [ArticleController::class, 'create'])->name('client.create');
    Route::post('/client/create', [ArticleController::class, 'store'])->name('client.store');
});
