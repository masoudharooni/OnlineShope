<?php

namespace App\Utilities\Uploaders;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Image
{
    public static function upload($image, $type, $basePath): string|false
    {
        if (!self::imageTypeValidator($type))
            dd('type file is not allowed!');
        $diskName = self::diskNameCreator($type);

        $path = $basePath . $type . "_" . $image->getClientOriginalName();
        $uploadResult = Storage::disk($diskName)->put($path, File::get($image));
        if (!$uploadResult)
            return false;
        return $path;
    }

    private static function imageTypeValidator(string $type): bool
    {
        if (!in_array($type, ['thumbnail', 'source', 'demo']))
            return false;
        return true;
    }

    private static function diskNameCreator(string $type): string
    {
        $diskName = 'public_storage';
        if ($type == 'source')
            $diskName = 'local_storage';
        return $diskName;
    }
}
