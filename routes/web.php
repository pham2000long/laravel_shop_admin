<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HomeController;

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

Route::get('/admin', [AdminController::class, 'login'])->name('admin.login');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/admin', [AdminController::class, 'postLogin'])->name('admin.postLogin');

Route::get('/', [HomeController::class, 'index'])->name('homes.index');

Route::prefix('admin')->group(function () {
    //categories
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index')->middleware('can:category-list');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('can:category-add');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('can:category-edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete')->middleware('can:category-delete');
    });

    //Menus
    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menus.index')->middleware('can:menu-list');
        Route::get('/create', [MenuController::class, 'create'])->name('menus.create');
        Route::post('/store', [MenuController::class, 'store'])->name('menus.store');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('menus.edit');
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('menus.update');
        Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('menus.delete');
    });

    //Products
    Route::prefix('products')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('products.index')->middleware('can:product-list');
        Route::get('/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('products.edit')->middleware('can:product-add,id');
        Route::post('/update/{id}', [AdminProductController::class, 'update'])->name('products.update');
        Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->name('products.delete');
    });

    //Sliders
    Route::prefix('sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('sliders.index');
        Route::get('/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('/store', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::post('/update/{id}', [SliderController::class, 'update'])->name('sliders.update');
        Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('sliders.delete');
    });

    //Settings
    Route::prefix('settings')->group(function () {
        Route::get('/', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::get('/create', [AdminSettingController::class, 'create'])->name('settings.create');
        Route::post('/store', [AdminSettingController::class, 'store'])->name('settings.store');
        Route::get('/edit/{id}', [AdminSettingController::class, 'edit'])->name('settings.edit');
        Route::post('/update/{id}', [AdminSettingController::class, 'update'])->name('settings.update');
        Route::get('/delete/{id}', [AdminSettingController::class, 'delete'])->name('settings.delete');
    });

    //Users
    Route::prefix('users')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('/store', [AdminUserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [AdminUserController::class, 'delete'])->name('users.delete');
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [AdminRoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [AdminRoleController::class, 'create'])->name('roles.create');
        Route::post('/store', [AdminRoleController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}', [AdminRoleController::class, 'edit'])->name('roles.edit');
        Route::post('/update/{id}', [AdminRoleController::class, 'update'])->name('roles.update');
        Route::get('/delete/{id}', [AdminRoleController::class, 'delete'])->name('roles.delete');
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/create', [AdminPermissionController::class, 'create'])->name('permissions.create');
        Route::post('/store', [AdminPermissionController::class, 'store'])->name('permissions.store');
    });

});
