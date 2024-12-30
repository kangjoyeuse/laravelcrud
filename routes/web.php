<?php

use Illuminate\Support\Facades\Route;
//reminder must import dashboardController
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\pemasukanController;

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

Route::get('/', function () {
    return view('dashboard.dashboard');
});

// Default dashboard
Route::get('dashboard', [dashboardController::class, 'index'])->name('dashboard'); 

// pemasukan
Route::get('data-pemasukan', [pemasukanController::class, 'index'])->name('pemasukan.index');

Route::get('create-pemasukan', [pemasukanController::class, 'create'])->name('pemasukan.create');

Route::post('pemasukan', [pemasukanController::class,'store'])->name('pemasukan.store');

Route::get('edit-pemasukan/{pemasukan}', [pemasukanController::class, 'edit'])->name('pemasukan.edit');

Route::patch('update-pemasukan/{pemasukan}', [pemasukanController::class, 'update'])->name('pemasukan.update');

Route::delete('delete-pemasukan/{pemasukan}', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy');