<?php

use Brucelwayne\Blog\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Controllers\UploadController;

Route::prefix('admin/blog')->name('admin.blog.')
    ->middleware(['web', 'auth:admin'])
    ->group(function () {

        //admin index page
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::get('single', [AdminController::class, 'single'])->name('single.show');

        Route::get('create', [AdminController::class, 'create'])->name('create.show');
        Route::post('create', [AdminController::class, 'store'])
            ->name('create.store');

        Route::get('edit', [AdminController::class, 'edit'])->name('edit.show');
        Route::post('edit', [AdminController::class, 'update'])
            ->name('edit.update');

        Route::delete('delete', [AdminController::class, 'index'])->name('delete');

        Route::get('cates', [AdminController::class, 'index'])->name('cates.show');

        Route::get('tags', [AdminController::class, 'index'])->name('tags.show');

        Route::prefix('file')->name('file.')->group(function () {
            Route::get('upload',[UploadController::class,'upload'])->name('upload');
            \UniSharp\LaravelFilemanager\Lfm::routes();
        });
    });