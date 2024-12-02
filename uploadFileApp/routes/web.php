<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UploadController::class, 'index'])->name('upload.index'); // View all
Route::get('/create', [UploadController::class, 'create'])->name('upload.create'); // Form upload
Route::post('/files', [UploadController::class, 'store'])->name('upload.store'); // Store
Route::get('image/{id}', [FileController::class, 'img'])->name('upload.show');;
Route::get('name/{file}', [FileController::class, 'show'])->name('upload.show');
