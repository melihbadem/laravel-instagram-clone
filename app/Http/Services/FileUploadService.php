<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

class FileUploadService
{
    /**
     * @param string $path
     * @param array|UploadedFile $file
     * @return string
     */
    public static function uploadFile(string $path, array|UploadedFile $file): string{
        $randomFileName = self::createRandomName($file->getClientOriginalExtension());
        $file->move(public_path($path), $randomFileName);

        return $randomFileName;
    }

    /**
     * a random value is assigned so that each image has a different name
     *
     * @param string $extension
     * @return string
     */
    public static function createRandomName(string $extension): string {
        $uniq = uniqid();

        return $uniq.
                      ".".
                      $extension;
    }
}
