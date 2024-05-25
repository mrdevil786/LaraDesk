<?php

namespace App\Helpers;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class FileUploader
{
    public static function uploadFile(UploadedFile $uploadedFile, string $targetPath, ?string $deleteOldFile = null): string
    {
        try {
            if ($deleteOldFile && file_exists(public_path($deleteOldFile))) {
                unlink(public_path($deleteOldFile));
            }
    
            $fileName = Str::random(25) . '.' . $uploadedFile->getClientOriginalExtension();
    
            $targetDirectory = public_path('storage/' . $targetPath);
            if (!is_dir($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }
    
            $uploadedFile->move($targetDirectory, $fileName);
    
            return 'storage/' . $targetPath . '/' . $fileName;
        } catch (Exception $e) {
            Log::error('Exception in file upload: ' . $e->getMessage());
            throw new Exception("Failed to upload file: " . $e->getMessage());
        }
    }    
}