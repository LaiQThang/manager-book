<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
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

    Route::prefix('users')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
        Route::get('/add',[UserController::class, 'add'])->name('users.add');
        Route::post('/postAdd',[UserController::class, 'postAdd'])->name('users.postAdd');
    });
});

Route::middleware('authentic.redirect')->prefix('authentic')->group(function(){
    Route::get('/',[LoginController::class, 'index'])->name('auth.index');
    Route::post('/login',[LoginController::class, 'login'])->name('auth.login');
    Route::post('/register', [LoginController::class, 'register'])->name('auth.register');
    Route::get('/active-permission/{token}', [LoginController::class, 'updatePermission'])->name('auth.updatePermission');
});
