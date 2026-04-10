<?php

use App\Http\Controllers\HsController;
use App\Http\Controllers\SvController;
use App\Mail\GuiMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hs', [HsController::class, 'hs']);
Route::post('hs', [HsController::class, 'hs_store'])->name('hs_store');

Route::get('sv', [SvController::class, 'sv']);
Route::post('sv', [SvController::class, 'sv_store'])->name('sv_store');

Route::get('guimail', function () {
    Mail::send(new GuiMail());
    return 'Đã gửi mail thử nghiệm từ Lab 7.';
});
