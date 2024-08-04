<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Technage\PMedia\Models\Media;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    /**
     * Upload a file to the specified storage path.
     *
     * @param UploadedFile $file The file to upload.
     * @param string $folder The folder where the file will be stored.
     * @param string $disk The storage disk to use (default is 'public').
     * @return string The path of the uploaded file.
     */
    public function uploadFile(UploadedFile $file, string $folder, string $disk = 'public'): string
    {
        // Create a unique file name to avoid collisions
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Store the file and return the path
        return $file->storeAs($folder, $fileName, $disk);
    }

    /**
     * Upload an array of files to the specified storage path.
     *
     * @param UploadedFile[] $files The array of files to upload.
     * @param string $folder The folder where the files will be stored.
     * @param string $disk The storage disk to use (default is 'public').
     * @return array The paths of the uploaded files.
     */
    public function uploadFiles(array $files, string $folder, string $disk = 'public'): array
    {
        $filePaths = [];

        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $filePaths[] = $this->uploadFile($file, $folder, $disk);
            }
        }

        return $filePaths;
    }

    /**
     * Update a file by removing the old one and uploading a new one.
     *
     * @param UploadedFile $newFile The new file to upload.
     * @param string $oldFilePath The path of the old file to be removed.
     * @param string $folder The folder where the new file will be stored.
     * @param string $disk The storage disk to use (default is 'public').
     * @return string The path of the uploaded new file.
     */
    public function updateFile(UploadedFile $newFile, string $oldFilePath, string $folder, string $disk = 'public'): string
    {
        // Delete the old file if it exists
        if (Storage::disk($disk)->exists($oldFilePath)) {
            Storage::disk($disk)->delete($oldFilePath);
        }

        // Upload the new file and return its path
        return $this->uploadFile($newFile, $folder, $disk);
    }

    /**
     * Delete a file from the storage.
     *
     * @param string $filePath The path of the file to delete.
     * @param string $disk The storage disk to use (default is 'public').
     * @return bool True if the file was deleted, false otherwise.
     */
    public function deleteFile(string $filePath, string $disk = 'public'): bool
    {
        // Delete the file and return the result
        return Storage::disk($disk)->delete($filePath);
    }

    /**
     * Generate a URL for a file stored in the specified storage disk.
     *
     * @param string $filePath The path of the file.
     * @param string $disk The storage disk to use (default is 'public').
     * @return string The URL of the file.
     */
    public function getFileUrl(string $filePath, string $disk = 'public'): string
    {
        return Storage::disk($disk)->url($filePath);
    }

    /**
     * Generate URLs for an array of file paths.
     *
     * @param array $filePaths The paths of the files.
     * @param string $disk The storage disk to use (default is 'public').
     * @return array The URLs of the files.
     */
    public function getFileUrls(array $filePaths, string $disk = 'public'): array
    {
        return array_map(function ($path) use ($disk) {
            return $this->getFileUrl($path, $disk);
        }, $filePaths);
    }
}
