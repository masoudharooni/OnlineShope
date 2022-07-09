<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoty;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $createdCategory = Categoty::create(['slug' => $request->slug, 'title' => $request->title]);
        if (!$createdCategory) {
            return back()->with('failed', 'دسته بندی اضافه نشد.');
        }
        return back()->with('success', 'دسته بندی اضافه شد');
    }
}
