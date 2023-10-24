<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/barang', function () {
    return view('barang.barang');
})->middleware(['auth', 'verified'])->name('barang');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// create group route barang
Route::prefix('/barang')->group(function () {

    // Show all Barang
    Route::get('/', [BarangController::class, 'index']);

    // Add Barang
    Route::get('/add', [BarangController::class, 'storeView']);

    Route::post('/add', [BarangController::class, 'store']);

    // Edit Barang
    Route::get('/edit/{id}', [BarangController::class, 'editView']);

    Route::put('/edit/{id}', [BarangController::class, 'edit']);

    // Delete Barang
    Route::get('/delete/{id}', [BarangController::class, 'deleteView']);
    Route::delete('/delete/{id}', [BarangController::class, 'delete']);
});

require __DIR__ . '/auth.php';
