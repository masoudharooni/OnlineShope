<?php

namespace App\Utilities\Uploaders;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Image
{
    public static function upload($image, $type, $basePath)
    {
        if (!in_array($type, ['thumbnail', 'source', 'demo']))
            dd('type file is not allowed!');
        $diskName = 'public_storage';
        if ($type == 'source')
            $diskName = 'local_storage';

        $path = $basePath . $type . "_" . $image->getClientOriginalName();
        $uploadResult = Storage::disk($diskName)->put($path, File::get($image));
        if (!$uploadResult)
            return false;
        return $path;
    }
}
