<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UploadController::class, 'index'])->name('upload.index');
Route::post('upload', [UploadController::class, 'upload'])->name('upload.upload');
Route::post('view', [UploadController::class, 'view'])->name('upload.view');
Route::post('img/(file)', [UploadController::class, 'img'])->name('upload.img');