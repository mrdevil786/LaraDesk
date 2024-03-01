<?php

namespace App\Helpers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Str;

class FileUploader
{
    public static function uploadFile($file, string $customPath = "", $deleteOldFile = null): string
    {
        try {
            if ($deleteOldFile) {
                Storage::delete($deleteOldFile);
            }

            $extension = $file->getClientOriginalExtension();
            $fileName = Str::random(25) . '.' . $extension;

            $filePath = $customPath ? $customPath . '/' . $fileName : $fileName;

            $file->storeAs($customPath, $fileName);

            return $filePath;
        } catch (Exception $e) {
            Log::error('Exception in file upload: ' . $e->getMessage());
            throw new Exception("Failed to upload file: " . $e->getMessage());
        }
    }
}
