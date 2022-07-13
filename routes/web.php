<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    # Categories routes
    Route::prefix('categories')->group(function () {

        Route::get('', [CategoriesController::class, 'all'])->name('admin.categories.all');
        Route::get('create', [CategoriesController::class, 'create'])->name('admin.categories.create');
        Route::post('', [CategoriesController::class, 'store'])->name('admin.categories.store');

        Route::delete('{category_id}/delete', [CategoriesController::class, 'delete'])->name('admin.categories.delete');

        Route::get('{category_id}/update', [CategoriesController::class, 'update'])->name('admin.categories.update');
        Route::put('{category_id}/edit', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
    });
    # products Routes
    Route::prefix('products')->group(function () {
        Route::get('create', [ProductsController::class, 'create'])->name('admin.products.create');
        Route::post('', [ProductsController::class, 'store'])->name('admin.products.store');
    });
});
