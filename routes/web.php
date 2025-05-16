<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyImageController;
use App\Http\Controllers\Admin\PropertyTypeController;
use App\Http\Controllers\Admin\UserController;
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
        // AdminController
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        //Article
        Route::get('/article', [AdminArticleController::class, 'index'])->name('admin.article.index');
        Route::get('/article/show/{id}', [AdminArticleController::class, 'show'])->name('admin.article.show');
        Route::get('/article/create', [AdminArticleController::class, 'create'])->name('admin.article.create');
        Route::post('/article/create', [AdminArticleController::class, 'store'])->name('admin.article.store');
        Route::get('/article/edit/{id}', [AdminArticleController::class, 'edit'])->name('admin.article.edit');
        Route::post('/article/edit/{id}', [AdminArticleController::class, 'update'])->name('admin.article.update');
        Route::get('/article/delete/{id}', [AdminArticleController::class, 'delete'])->name('admin.article.delete');
        // PropertyType
        Route::get('/property_types', [PropertyTypeController::class, 'index'])->name('admin.property_types.index');
        Route::get('/property_types/show/{id}', [PropertyTypeController::class, 'show'])->name('admin.property_types.show');
        Route::get('/property_types/create', [PropertyTypeController::class, 'create'])->name('admin.property_types.create');
        Route::post('/property_types/create', [PropertyTypeController::class, 'store'])->name('admin.property_types.store');
        Route::get('/property_types/edit/{id}', [PropertyTypeController::class, 'edit'])->name('admin.property_types.edit');
        Route::post('/property_types/edit/{id}', [PropertyTypeController::class, 'update'])->name('admin.property_types.update');
        Route::post('/property_types/destroy/{id}', [PropertyTypeController::class, 'destroy'])->name('admin.property_types.destroy');
        //Property
        Route::get('/property', [PropertyController::class, 'index'])->name('admin.property.index');
        Route::get('/property/show/{id}', [PropertyController::class, 'show'])->name('admin.property.show');
        Route::get('/property/create', [PropertyController::class, 'create'])->name('admin.property.create');
        Route::post('/property/create', [PropertyController::class, 'store'])->name('admin.property.store');
        Route::get('/property/edit/{id}', [PropertyController::class, 'edit'])->name('admin.property.edit');
        Route::put('/property/edit/{id}', [PropertyController::class, 'update'])->name('admin.property.update');
        Route::post('/property/destroy/{id}', [PropertyController::class, 'destroy'])->name('admin.property.destroy');
        //PropertyImage
        Route::get('/property_image', [PropertyImageController::class, 'index'])->name('admin.property_image.index');
        Route::get('/property_image/create', [PropertyImageController::class, 'create'])->name('admin.property_image.create');
        Route::post('/property_image/create', [PropertyImageController::class, 'store'])->name('admin.property_image.store');
        Route::get('/property_image/edit/{id}', [PropertyImageController::class, 'edit'])->name('admin.property_image.edit');
        Route::post('/property_image/edit/{id}', [PropertyImageController::class, 'update'])->name('admin.property_image.update');
        Route::delete('/property_image/destroy/{id}', [PropertyImageController::class, 'destroy'])->name('admin.property_image.destroy');
        //Location
        Route::get('/location', [LocationController::class, 'index'])->name('admin.location.index');
        Route::get('/location/create', [LocationController::class, 'create'])->name('admin.location.create');
        Route::post('/location/create', [LocationController::class, 'store'])->name('admin.location.store');
        Route::get('/location/show/{id}', [LocationController::class, 'show'])->name('admin.location.show');
        Route::get('/location/edit/{id}', [LocationController::class, 'edit'])->name('admin.location.edit');
        Route::post('/location/edit/{id}', [LocationController::class, 'update'])->name('admin.location.update');
        Route::delete('/location/destroy/{id}', [LocationController::class, 'destroy'])->name('admin.location.destroy');
        //User
        Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/user/edit/{id}', [UserController::class, 'update'])->name('admin.user.update');
    });
});
