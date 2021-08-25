<?php

namespace App\Http\Controllers\Traits;

use Intervention\Image\Facades\Image;

trait MediaConversionTrait
{

    // Convert image to thumbnail 50 x 50
    public function convertToThumbnail($subPath = null, $media = null)
    {
        // if (!$media || $subPath) {
        //     return;
        // }

        return Image::make(storage_path("app/public/$subPath/") . $media)
            ->resize(50, 50)
            // ->crop(50, 50, 50, 50)
            ->save(storage_path("app/public/$subPath/thumbnails/") . $media);
    }

    // Convert image to previews 120 x 120
    public function convertToPreview($subPath = null, $media = null)
    {
        // if (!$media || $subPath) {
        //     return;
        // }

        return Image::make(storage_path("app/public/$subPath/") . $media)
            ->resize(120, 120)
            // ->crop(120, 120, 50, 50)
            ->save(storage_path("app/public/$subPath/previews/") . $media);
    }
}
