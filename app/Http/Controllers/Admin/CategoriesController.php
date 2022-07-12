<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
        $createdCategory = Category::create([
            'slug' => $validatedData['slug'], 'title' => $validatedData['title']
        ]);
        if (!$createdCategory)
            return back()->with('failed', 'دسته بندی اضافه نشد.');
        return back()->with('success', 'دسته بندی اضافه شد');
    }

    public function all()
    {
        $categories = Category::paginate(7);
        return view('admin.categories.all', compact('categories'));
    }

    public function delete(int $category_id)
    {
        $category = Category::find($category_id);
        $category->delete();
        return back()->with('success', "دسته بندی '{$category['title']}' حذف شد.");
    }
}
