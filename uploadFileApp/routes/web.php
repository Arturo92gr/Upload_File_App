<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UploadController::class, 'index'])->name('upload.index');
Route::get('/create', [UploadController::class, 'create'])->name('upload.create');
Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');
Route::get('image/{id}', [UploadController::class, 'image'])->name('upload.image');
Route::get('show/{file}', [UploadController::class, 'show'])->name('upload.show');
Route::delete('delete/{id}', [UploadController::class, 'destroy'])->name('upload.destroy');
