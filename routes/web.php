<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.index');
});
Route::get('/', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/article/', [ArticleController::class, 'index'])->name('client.article.index');
Route::get('/client/article/show/{id}', [ClientController::class, 'show'])->name('client.article.show');
Route::get('/client/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/client/register', [AuthController::class, 'register'])->name('register');
Route::get('/client/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/client/login', [AuthController::class, 'login']);
Route::post('/client/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/client/article/create', [ArticleController::class, 'create'])->name('client.article.create');
    Route::post('/client/article/create', [ArticleController::class, 'store'])->name('client.article.store');
});
//Admin
Route::middleware(['auth', 'auth.role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/article', [AdminArticleController::class, 'index'])->name('admin.article.index');
        Route::get('/article/show/{id}', [AdminArticleController::class, 'show'])->name('admin.article.show');
        Route::get('/article/create', [AdminArticleController::class, 'create'])->name('admin.article.create');
        Route::post('/article/create', [AdminArticleController::class, 'store'])->name('admin.article.store');
        Route::get('/article/edit/{id}', [AdminArticleController::class, 'edit'])->name('admin.article.edit');
        Route::post('/article/edit/{id}', [AdminArticleController::class, 'update'])->name('admin.article.update');
        Route::get('/article/delete/{id}', [AdminArticleController::class, 'delete'])->name('admin.article.delete');
        // PropertyType
        Route::get('/category', [AdminCategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/category/show/{id}', [AdminCategoryController::class, 'show'])->name('admin.category.show');
        Route::get('/category/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/category/create', [AdminCategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/category/edit/{id}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
        Route::post('/category/destroy/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');
    });
});
