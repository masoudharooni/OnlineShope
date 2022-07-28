<?php

namespace App\Utilities\Uploaders;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Image
{
    public static function upload(object $image, string $basePath, bool $publicAccess = true): string|\Exception
    {
        $diskName = self::diskCreator($publicAccess);
        $path = self::pathCreator($basePath, $image);
        $uploadResult = Storage::disk($diskName)->put($path, File::get($image));
        if (!$uploadResult)
            return throw new \Exception('Upload failed!');
        return $path;
    }

    public static function delete(object $product, array $imageNames, bool $publicAccess = true)
    {
        if ($publicAccess) {
            foreach ($imageNames as $name) {
                File::delete(public_path($product->$name));
            }
        } else {
            foreach ($imageNames as $name) {
                File::delete(storage_path('app/local_storage/' . $product->$name));
            }
        }
    }

    public static function deleteAll(object $product)
    {
        self::delete($product, ['thumbnail_url', 'demo_url']);
        self::delete($product, ['source_url'], false);
    }

    private static function diskCreator(bool $publicAccess): string
    {
        $diskName = 'public_storage';
        if (!$publicAccess)
            $diskName = 'local_storage';
        return $diskName;
    }

    private static function pathCreator(string $basePath, object $image): string
    {
        return $basePath . "_" . $image->getClientOriginalName();
    }
}
