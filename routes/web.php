<?php

use App\Http\Controllers\Admin\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::prefix('categories')->group(function () {

        Route::get('', [CategoriesController::class, 'all'])->name('admin.categories.all');
        Route::get('create', [CategoriesController::class, 'create'])->name('admin.categories.create');
        Route::post('', [CategoriesController::class, 'store'])->name('admin.categories.store');

        Route::delete('{category_id}/delete', [CategoriesController::class, 'delete'])->name('admin.categories.delete');
    });
});
