<?php

use Illuminate\Support\Facades\Route;


Route::get('products/all', function () {
    return view('frontend.products.all');
});

Route::get('admin/panel', function () {
    return view('admin.dashboard');
});
