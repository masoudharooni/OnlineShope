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

    public static function delete(object $product, string $imageName, bool $publicAccess = true)
    {
        if ($publicAccess) {
            File::delete(public_path($product->$imageName));
        } else {
            File::delete(storage_path('app/local_storage/' . $product->$imageName));
        }
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
