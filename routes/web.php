<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


Route::any('/', function () {
    return view('image.create');
});
//password for admin-tpbranch_2024
Route::get('/image/create', [ImageController::class, 'create'])->name('image.create');
Route::post('/image/store', [ImageController::class, 'store'])->name('image.store');

Route::get('/image/display', [ImageController::class, 'display'])->name('image.display');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/registers', [RegisterController::class, 'registers'])->name('registers');
Route::get('/image/admin', [LoginController::class, 'login']);
Route::post('/image/admin', [LoginController::class, 'authenticate'])->name('image.admin');
Route::middleware(['auth'])->group(function () {
    Route::get('/image/index', [LoginController::class, 'adminDisplay']);
});
Route::post('/image/logout', [LoginController::class, 'logout'])->name('logout');
Route::delete('/image/delete/{id}', [LoginController::class, 'deleteItem'])->name('image.delete');
