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

        try {
            $basePath = 'products/' . $createdProduct->id . "/";

            # uploading process
            $thumbnail_url = Image::upload($validatedData['thumbnail_url'], 'thumbnail', $basePath);
            $demo_url      = Image::upload($validatedData['demo_url'], 'demo', $basePath);
            $source_url    = Image::upload($validatedData['source_url'], 'source', $basePath);

            $updatedProduct = $createdProduct->update([
                'thumbnail_url' => $thumbnail_url,
                'demo_url'      => $demo_url,
                'source_url'    => $source_url
            ]);
            if (!$updatedProduct)
                throw new \Exception('failed', 'محصول مورد نظر ساخته نشد.');

            return back()->with('success', 'محصول مورد نظر با موفقیت ساخته شد.');
        } catch (\Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
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

    public function sourceDownload(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        return response()->download(storage_path('app/local_storage/' . $product->source_url));
    }

    public function thumbnailDownload(int $product_id)
    {
        $product = Product::find($product_id);
        return response()->download(public_path($product->thumbnail_url));
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
}
