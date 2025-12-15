<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    // Index bisa diakses semua role
    Route::get('jenis_produk', [JenisProdukController::class, 'index'])
        ->name('jenis_produk.index');

    // CRUD lain hanya admin
    Route::middleware('isAdmin')->group(function () {
        Route::get('jenis_produk/create', [JenisProdukController::class, 'create'])
            ->name('jenis_produk.create');
        Route::post('jenis_produk', [JenisProdukController::class, 'store'])
            ->name('jenis_produk.store');
        Route::get('jenis_produk/{jenis_produk}/edit', [JenisProdukController::class, 'edit'])
            ->name('jenis_produk.edit');
        Route::put('jenis_produk/{jenis_produk}', [JenisProdukController::class, 'update'])
            ->name('jenis_produk.update');
        Route::delete('jenis_produk/{jenis_produk}', [JenisProdukController::class, 'destroy'])
            ->name('jenis_produk.destroy');
    });
});



require __DIR__.'/auth.php';
