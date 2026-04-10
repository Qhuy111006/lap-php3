<?php

use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/tin');

Route::prefix('tin')->name('tin.')->group(function () {
    Route::get('/', [TinController::class, 'index'])->name('index');
    Route::get('/them', [TinController::class, 'create'])->name('create');
    Route::post('/them', [TinController::class, 'store'])->name('store');
    Route::get('/capnhat/{idTin}', [TinController::class, 'edit'])->name('edit');
    Route::post('/capnhat/{idTin}', [TinController::class, 'update'])->name('update');
    Route::get('/xoa/{idTin}', [TinController::class, 'destroy'])->name('destroy');
});
