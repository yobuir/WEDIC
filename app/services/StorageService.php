<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class StorageService
{
    /**
     * Recreate the storage link and handle existing storage directory or link
     *
     * @return bool
     */
    public static function refreshStorageLink()
    {
        try {
            // Remove any existing storage link or directory
            self::removeStorageLink();

            // Recreate the storage link using Artisan
            Artisan::call('storage:link');

            Log::info('Storage link refreshed successfully');
            return true;
        } catch (\Exception $e) {
            Log::error('Failed to refresh storage link: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Remove the existing storage link or directory if it exists
     */
    private static function removeStorageLink()
    {
        $storageLink = public_path('storage');

        try {
            if (file_exists($storageLink)) {
                // If it's a directory, delete it and its contents
                if (is_dir($storageLink)) {
                    self::deleteDirectory($storageLink);
                    Log::info('Removed directory and all contents at public/storage.');
                } elseif (is_link($storageLink)) {
                    // If it's a symlink, unlink it
                    unlink($storageLink);
                    Log::info('Removed symbolic link at public/storage.');
                }
            } else {
                Log::info('No existing storage link or directory found at: ' . $storageLink);
            }
        } catch (\Throwable $th) {
            Log::error('Error removing storage link or directory: ' . $th->getMessage());
        }
    }

    /**
     * Recursively delete a directory and all its contents
     *
     * @param string $dir
     */
    private static function deleteDirectory($dir)
    {
        if (!is_dir($dir)) return;

        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object !== "." && $object !== "..") {
                $filePath = $dir . DIRECTORY_SEPARATOR . $object;
                if (is_dir($filePath) && !is_link($filePath)) {
                    // Recursively delete subdirectories
                    self::deleteDirectory($filePath);
                } else {
                    // Delete the file
                    unlink($filePath);
                }
            }
        }
        // Remove the now-empty directory
        rmdir($dir);
    }
}
