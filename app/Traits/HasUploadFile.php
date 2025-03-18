<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasUploadFile
{
    public function uploadFile(UploadedFile $file, string $folder = 'uploads'): string
    {
        return $file->store($folder, 'public');
    }

    public function deleteFile(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    public function updateFile(UploadedFile $file, ?string $oldFile = null, string $folder = 'uploads'): string
    {
        if ($oldFile) {
            $this->deleteFile($oldFile);
        }

        return $this->uploadFile($file, $folder);
    }
} 