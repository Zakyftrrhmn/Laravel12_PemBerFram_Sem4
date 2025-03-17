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

// Route::get('/', function () {
//     return view('welcome');
// });
