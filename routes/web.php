<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth', 'verified', 'role:admin');
Route::get('/', [AppController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [AppController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/new', [AppController::class, 'new'])->middleware(['auth', 'verified'])->name('new');
//Route::post('/new/{id}', [AppController::class, 'save'])->middleware(['auth', 'verified'])->name('newsave');
Route::post('/new/{id}', [AppController::class, 'save'])->middleware(['auth', 'verified'])->name('newsave');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::put('/admin/demande/{id}/approuver', [AdminController::class, 'approuver'])->name('admin.demande.approuver');
Route::put('/admin/demande/{id}/rejeter', [AdminController::class, 'rejeter'])->name('admin.demande.rejeter');
require __DIR__.'/auth.php';
