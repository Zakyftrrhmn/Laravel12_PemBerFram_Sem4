<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\DispositionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


Route::get('/inbox', [InboxController::class, 'index'])->name('inbox.index')->middleware('auth');
Route::get('/inbox/create', [InboxController::class, 'create'])->name('inbox.create')->middleware('auth');
Route::post('/inbox/store', [InboxController::class, 'store'])->name('inbox.store')->middleware('auth');
Route::get('/inbox/edit/{id}', [InboxController::class, 'edit'])->name('inbox.edit')->middleware('auth');
Route::put('/inbox/update/{id}', [InboxController::class, 'update'])->name('inbox.update')->middleware('auth');
route::delete('/inbox/delete/{id}', [InboxController::class, 'destroy'])->name('inbox.destroy')->middleware('auth');
Route::get('/inbox/show/{id}', [InboxController::class, 'show'])->name('inbox.show')->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware('auth');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store')->middleware('auth');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');


Route::get('/send', [SendController::class, 'index'])->name('send.index')->middleware('auth');
Route::get('/send/create', [SendController::class, 'create'])->name('send.create')->middleware('auth');
Route::post('/send/store', [SendController::class, 'store'])->name('send.store')->middleware('auth');
Route::get('/send/edit/{id}', [SendController::class, 'edit'])->name('send.edit')->middleware('auth');
Route::put('/send/update/{id}', [SendController::class, 'update'])->name('send.update')->middleware('auth');
route::delete('/send/delete/{id}', [SendController::class, 'destroy'])->name('send.destroy')->middleware('auth');
Route::get('/send/show/{id}', [SendController::class, 'show'])->name('send.show');

Route::resource('disposition', DispositionController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');






// Route::get('/', function () {
//     return view('welcome');
// });
