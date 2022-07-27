<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreRequest;
use App\Http\Requests\Admin\Products\UpdateRequest;
use App\Models\Category;
use App\Utilities\Uploaders\Product as ProductUploader;
use App\Models\Product;
use App\Models\User;

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
        return ProductUploader::storeUploader($createdProduct, $validatedData);
    }

    public function all()
    {
        $products = Product::paginate(7);
        return view('admin.products.all', compact('products'));
    }

    public function demoDownload(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        return response()->download(public_path($product->demo_url));
    }

    public function thumbnailDownload(int $product_id)
    {
        $product = Product::find($product_id);
        return response()->download(public_path($product->thumbnail_url));
    }

    public function sourceDownload(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        return response()->download(storage_path('app/local_storage/' . $product->source_url));
    }


    public function delete(int $product_id)
    {
        $result = Product::find($product_id)->delete();
        if (!$result)
            return back()->with('failed', " متاسفانه محصول حذف نشد، مجددا تلاش کنید.");
        return back()->with('success', "محصول با موفقیت حذف شد.");
    }

    public function update(int $product_id)
    {
        $categories = Category::all();
        $product    = Product::find($product_id);
        return view('admin.products.update', compact('categories', 'product'));
    }

    public function edit(UpdateRequest $request, int $product_id)
    {
        $validatedData = $request->validated();
        $product = Product::findOrFail($product_id);
        $product->update([
            'title'         => $validatedData['title'],
            'category_id'   => $validatedData['category_id'],
            'description'   => $validatedData['description'],
            'price'         => $validatedData['price']
        ]);
        return ProductUploader::editUploader($product, $validatedData);
    }
}
