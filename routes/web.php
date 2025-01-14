<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\pemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\AuthController;

Route::get('/', [dashboardController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [dashboardController::class, 'index'])->name('dashboard');

    // pemasukan
    Route::get('data-pemasukan', [pemasukanController::class, 'index'])->name('pemasukan.index');
    Route::get('create-pemasukan', [pemasukanController::class, 'create'])->name('pemasukan.create');
    Route::post('pemasukan', [pemasukanController::class, 'store'])->name('pemasukan.store');
    Route::get('edit-pemasukan/{pemasukan}', [pemasukanController::class, 'edit'])->name('pemasukan.edit');
    Route::patch('update-pemasukan/{pemasukan}', [pemasukanController::class, 'update'])->name('pemasukan.update');
    Route::delete('delete-pemasukan/{pemasukan}', [pemasukanController::class, 'destroy'])->name('pemasukan.destroy');

    // pengeluaran
    Route::get('data-pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
    Route::get('create-pengeluaran', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
    Route::post('pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
    Route::get('edit-pengeluaran/{pengeluaran}', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
    Route::patch('update-pengeluaran/{pengeluaran}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
    Route::delete('delete-pengeluaran/{pengeluaran}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');
    Route::get('pengeluaran/{pengeluaran}', [PengeluaranController::class, 'show'])->name('pengeluaran.show');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // Admin-only routes
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Add more admin routes as needed
});

require __DIR__.'/auth.php';
