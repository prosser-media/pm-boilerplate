<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
    public function UserImageUpload($image, $location)
    {
        $uploadPath = 'pm-content/images/' . $location;

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath);
        }

        $imageName = Str::random(20);
        $extension = strtolower($image->getClientOriginalExtension());

        $imageFullName = $imageName . '.' . $extension;
        $imageUrl = $uploadPath . $imageFullName;

        $success = $image->move($uploadPath, $imageFullName);

        return $imageUrl;
    }
}
