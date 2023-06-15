<?php

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('authentic')->prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');

    Route::middleware('permissionUser')->prefix('users')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
        Route::get('/add',[UserController::class, 'add'])->name('users.add');
        Route::post('/postAdd',[UserController::class, 'postAdd'])->name('users.postAdd');
    });
    Route::middleware('permissionLink')->prefix('permission')->group(function(){
        Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::post('/update', [PermissionController::class, 'update'])->name('permission.update');
        Route::get('/delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');
        Route::get('/add',[PermissionController::class, 'add'])->name('permission.add');
        Route::post('/postAdd',[PermissionController::class, 'postAdd'])->name('permission.postAdd');
    });
    Route::middleware('permissionCategory')->prefix('category')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/add',[CategoryController::class, 'add'])->name('category.add');
        Route::post('/postAdd',[CategoryController::class, 'postAdd'])->name('category.postAdd');
    });
    Route::middleware('permissionCategory')->prefix('classify')->group(function(){
        Route::get('/edit/{id}', [CategoryController::class, 'editClassify'])->name('classify.edit');
        Route::post('/update', [CategoryController::class, 'updateClassify'])->name('classify.update');
        Route::get('/delete/{id}', [CategoryController::class, 'deleteClassify'])->name('classify.delete');
    });
    Route::middleware('permissionProduct')->prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/add',[ProductController::class, 'add'])->name('product.add');
        Route::post('/postAdd',[ProductController::class, 'postAdd'])->name('product.postAdd');
    });


    // Route::prefix('cart')->group(function(){
    //     Route::get('/', [ProductController::class, 'index'])->name('product.index');
    //     Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    //     Route::post('/update', [ProductController::class, 'update'])->name('product.update');
    //     Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    //     Route::get('/add',[ProductController::class, 'add'])->name('product.add');
    //     Route::post('/postAdd',[ProductController::class, 'postAdd'])->name('product.postAdd');
    // });
    // Route::prefix('display')->group(function(){
    //     Route::get('/', [ProductController::class, 'index'])->name('product.index');
    //     Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    //     Route::post('/update', [ProductController::class, 'update'])->name('product.update');
    //     Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    //     Route::get('/add',[ProductController::class, 'add'])->name('product.add');
    //     Route::post('/postAdd',[ProductController::class, 'postAdd'])->name('product.postAdd');
    // });
});

Route::middleware('authentic.redirect')->prefix('authentic')->group(function(){
    Route::get('/',[LoginController::class, 'index'])->name('auth.index');
    Route::post('/login',[LoginController::class, 'login'])->name('auth.login');
    Route::post('/register', [LoginController::class, 'register'])->name('auth.register');
    Route::get('/active-permission/{token}', [LoginController::class, 'updatePermission'])->name('auth.updatePermission');
});
