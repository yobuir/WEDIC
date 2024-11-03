<?php

namespace App\Livewire\Pages\Dashboard\Album;

use App\Models\Album;
use App\Models\GalleryImage;
use App\Services\StorageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class EditLivewire extends Component
{

    use WithFileUploads;

    public $album_id;
    public $name;
    public $description;
    public $status = 'draft';
    public $cover_image;
    public $newCoverImage;
    public $images = [];
    public $newImages = [];
    public $imageOrder = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|in:draft,published',
        'newCoverImage' => 'nullable|image|max:10240'
    ];

    protected $messages = [
        'newCoverImage.max' => 'The cover image must not be larger than 10MB.',
        'newImages.*.max' => 'Each gallery image must not be larger than 10MB.',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $album = Album::with('images')->findOrFail($id);
            $this->album_id = $id;
            $this->name = $album->name;
            $this->description = $album->description;
            $this->status = $album->status;
            $this->cover_image = $album->cover_image;
            $this->images = $album->images->toArray();
            $this->imageOrder = $album->images->pluck('order', 'id')->toArray();
        }
    }

    public function updatedNewImages()
    {
        $this->validate([
            'newImages.*' => 'image|max:5120',
        ]);
    }

    public function removeNewImage($index)
    {
        unset($this->newImages[$index]);
        $this->newImages = array_values($this->newImages);
    }

    public function removeExistingImage($imageId)
    {
        try {
            $image = GalleryImage::findOrFail($imageId);

            // Get filename from the full URL
            $path = parse_url($image->image_path, PHP_URL_PATH);
            $filename = basename($path);

            // Delete the file
            Storage::disk('AlbumImages')->delete($filename);
            $image->delete();

            // Remove from local array
            $this->images = array_filter($this->images, function ($img) use ($imageId) {
                return $img['id'] != $imageId;
            });

            session()->flash('message', 'Image removed successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error removing image: ' . $e->getMessage());
        }
    }

    public function updateImageOrder($orderedIds)
    {
        foreach ($orderedIds as $order => $id) {
            GalleryImage::where('id', $id)->update(['order' => $order]);
        }
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            // Create or update album
            $album = Album::updateOrCreate(
                ['id' => $this->album_id],
                [
                    'name' => $this->name,
                    'description' => $this->description,
                    'status' => $this->status
                ]
            );

            // Handle cover image
            if ($this->newCoverImage) {
                // Delete old cover image if exists
                if ($album->cover_image) {
                    $oldPath = parse_url($album->cover_image, PHP_URL_PATH);
                    $oldFilename = basename($oldPath);
                    Storage::disk('AlbumThumbnail')->delete($oldFilename);
                }

                // Optimize and store the new cover image
                $optimizedCover = $this->optimizeImage($this->newCoverImage, 'cover');
                $coverPath = $optimizedCover['path'];
                $imageUrl = Storage::disk('AlbumThumbnail')->url($coverPath);
                $album->update(['cover_image' => $imageUrl]);
            }

            // Handle new images
            if (!empty($this->newImages)) {
                $lastOrder = GalleryImage::where('album_id', $album->id)->max('order') ?? 0;

                foreach ($this->newImages as $image) {
                    $lastOrder++;

                    // Optimize and store the image
                    $optimizedImage = $this->optimizeImage($image, 'gallery');
                    $path = $optimizedImage['path'];
                    $imageUrl = Storage::disk('AlbumImages')->url($path);
                    StorageService::refreshStorageLink();
                    GalleryImage::create([
                        'album_id' => $album->id,
                        'image_path' => $imageUrl,
                        'order' => $lastOrder,
                        'size' => $optimizedImage['size'], // Optional: store the file size
                        'dimensions' => $optimizedImage['dimensions'], // Optional: store dimensions
                    ]);
                }
            }

            DB::commit();
            session()->flash(
                'message',
                $this->album_id ? 'Album updated successfully.' : 'Album created successfully.'
            );
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Album save error: ' . $e->getMessage());
            session()->flash('error', 'Error saving album: ' . $e->getMessage());
        }

        return $this->redirect(url()->previous(), navigate: true);
    }

    private function optimizeImage($uploadedFile, $type = 'gallery')
    {
        // Create new ImageManager instance
        $manager = new ImageManager(new Driver());

        // Read image
        $image = $manager->read($uploadedFile);

        // Get original dimensions
        $originalWidth = $image->width();
        $originalHeight = $image->height();

        // Maximum dimensions
        $maxWidth = 2000;
        $maxHeight = 2000;

        // Maximum file size in bytes (5MB)
        $maxFileSize = 5 * 1024 * 1024;

        // Resize if image is too large while maintaining aspect ratio
        if ($originalWidth > $maxWidth || $originalHeight > $maxHeight) {
            $image->scale(width: $maxWidth, height: $maxHeight);
        }

        // Generate unique filename
        $filename = Str::uuid() . '.' . $uploadedFile->getClientOriginalExtension();

        // Set initial quality
        $quality = 90;

        do {
            // Create a temporary file
            $tempPath = sys_get_temp_dir() . '/' . $filename;

            // Save with current quality
            $image->toJpeg($quality)->save($tempPath);

            // Get file size
            $fileSize = filesize($tempPath);

            // Reduce quality if file is too large
            if ($fileSize > $maxFileSize && $quality > 10) {
                $quality -= 10;
            } else {
                break;
            }
        } while ($quality > 10);

        // Store the optimized image
        $disk = $type === 'cover' ? 'AlbumThumbnail' : 'AlbumImages';
        Storage::disk($disk)->put($filename, file_get_contents($tempPath));

        // Clean up temporary file
        unlink($tempPath);

        // Return image information
        return [
            'path' => $filename,
            'size' => $fileSize,
            'dimensions' => [
                'width' => $image->width(),
                'height' => $image->height()
            ],
            'quality' => $quality
        ];
    }
    public function render()
    {
        return view('livewire.pages.dashboard.album.edit-livewire');
    }
}
