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

Route::get('/image/admin', [LoginController::class, 'login']);
Route::post('/image/admin', [LoginController::class, 'authenticate'])->name('image.admin');
Route::middleware(['auth'])->group(function () {
    Route::get('/image/index', [LoginController::class, 'adminDisplay'])->name('image.index');
});
Route::post('/image/logout', [LoginController::class, 'logout'])->name('logout');
Route::delete('/image/delete/{id}', [LoginController::class, 'deleteItem'])->name('image.delete');
Route::post('image/adminStore/{id}', [ImageController::class, 'adminStore'])->name('image.admin.store'); 
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/registers', [RegisterController::class, 'registers'])->name('registers');
Route::get('/image/edit', [LoginController::class, 'editAdmin'])->name('image.edit');
Route::post('/image/update', [LoginController::class ,'updateAdmin'])->name('image.update');

