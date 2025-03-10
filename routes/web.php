<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\DispositionController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/inbox', [InboxController::class, 'index'])->name('inbox.index');
Route::get('/inbox/create', [InboxController::class, 'create'])->name('inbox.create');
Route::get('/inbox/edit', [InboxController::class, 'edit'])->name('inbox.edit');
Route::get('/inbox/show', [InboxController::class, 'show'])->name('inbox.show');
