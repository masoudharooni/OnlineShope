<?php

namespace App\Utilities\Uploaders;

use App\Utilities\Uploaders\Image;
use Illuminate\Support\Facades\File;

class Product
{
    private static function basePathCreator(int $product_id): string
    {
        return 'products/' . $product_id . "/";
    }

    public static function storeUploader(object $product, array $validatedData)
    {
        try {
            $basePath = self::basePathCreator($product->id);

            # uploading process
            $thumbnail_url = Image::upload($validatedData['thumbnail_url'], $basePath);
            $demo_url      = Image::upload($validatedData['demo_url'], $basePath);
            $source_url    = Image::upload($validatedData['source_url'], $basePath, false);

            $updatedProduct = $product->update([
                'thumbnail_url' => $thumbnail_url,
                'demo_url'      => $demo_url,
                'source_url'    => $source_url
            ]);
            if (!$updatedProduct)
                return throw new \Exception('failed', 'محصول مورد نظر ساخته نشد.');

            return back()->with('success', 'محصول مورد نظر با موفقیت ساخته شد.');
        } catch (\Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    public static function editUploader(object $product, array $validatedData)
    {
        try {
            $basePath = self::basePathCreator($product->id);

            if (isset($validatedData['thumbnail_url'])) {
                $thumbnail_url = Image::upload($validatedData['thumbnail_url'], $basePath);
                File::delete(public_path($product->thumbnail_url));
                $product->update(['thumbnail_url' => $thumbnail_url]);
            }
            if (isset($validatedData['demo_url'])) {
                $demo_url = Image::upload($validatedData['demo_url'], $basePath);
                File::delete(public_path($product->demo_url));
                $product->update(['demo_url' => $demo_url]);
            }
            if (isset($validatedData['source_url'])) {
                $source_url = Image::upload($validatedData['source_url'], $basePath, false);
                File::delete(storage_path('app/local_storage/' . $product->source_url));
                $product->update(['source_url' => $source_url]);
            }
            return back()->with('success', 'محصول مورد نظر با موفقیت ویرایش شد.');
        } catch (\Exception $e) {
            throw new \Exception("Error Processing Request: {$e->getMessage()}, in line: {$e->getLine()}, in file: {$e->getFile()}");
        }
    }
}
