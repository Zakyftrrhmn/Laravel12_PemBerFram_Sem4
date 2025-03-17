<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\DispositionController;



Route::get('/inbox', [InboxController::class, 'index'])->name('inbox.index');
Route::get('/inbox/create', [InboxController::class, 'create'])->name('inbox.create');
Route::post('/inbox/store', [InboxController::class, 'store'])->name('inbox.store');
Route::get('/inbox/edit/{id}', [InboxController::class, 'edit'])->name('inbox.edit');
Route::put('/inbox/update/{id}', [InboxController::class, 'update'])->name('inbox.update');
route::delete('/inbox/delete/{id}', [InboxController::class, 'destroy'])->name('inbox.destroy');
Route::get('/inbox/show{id}', [InboxController::class, 'show'])->name('inbox.show');

Route::get('/send', [SendController::class, 'index'])->name('send.index');
Route::get('/send/create', [SendController::class, 'create'])->name('send.create');
Route::post('/send/store', [SendController::class, 'store'])->name('send.store');
Route::get('/send/edit/{id}', [SendController::class, 'edit'])->name('send.edit');
Route::put('/send/update/{id}', [SendController::class, 'update'])->name('send.update');
route::delete('/send/delete/{id}', [SendController::class, 'destroy'])->name('send.destroy');
Route::get('/send/show{id}', [SendController::class, 'show'])->name('send.show');

// Route::get('/', function () {
//     return view('welcome');
// });
