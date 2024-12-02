<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UploadController::class, 'index'])->name('upload.index'); // View all
Route::get('/create', [UploadController::class, 'create'])->name('upload.create'); // Form upload
Route::post('/upload/store', [UploadController::class, 'store'])->name('upload.store'); // Store
Route::get('/show/{storage_name}', [UploadController::class, 'show'])->name('upload.show'); // View one