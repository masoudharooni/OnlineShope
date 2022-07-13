<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Utilities\Uploaders\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
        $admin = User::where('email', 'admin@gmail.com')->first();
        $createdProduct = Product::create([
            'title'         => $validatedData['title'],
            'category_id'   => $validatedData['category_id'],
            'owner_id'      => $admin->id,
            'description'   => $validatedData['description'],
            'price'         => $validatedData['price']
        ]);

        $basePath = 'products/' . $createdProduct->id . "/";

        # uploading process
        $thumbnail_url = Image::upload($validatedData['thumbnail_url'], 'thumbnail', $basePath);
        $demo_url      = Image::upload($validatedData['demo_url'], 'demo', $basePath);
        $source_url    = Image::upload($validatedData['source_url'], 'source', $basePath);

        $result = $createdProduct->update([
            'thumbnail_url' => $thumbnail_url,
            'demo_url'      => $demo_url,
            'source_url'    => $source_url
        ]);
        if (!$result)
            return back()->with('failed', 'محصول مورد نظر ساخته نشد.');
        return back()->with('success', 'محصول مورد نظر با موفقیت ساخته شد.');
    }
}
