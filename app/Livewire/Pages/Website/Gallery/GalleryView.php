<?php

namespace App\Livewire\Pages\Website\Gallery;

use App\Models\Album;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;

class GalleryView extends Component
{
    use WithPagination;

    public $selectedAlbum = null;
    public $selectedImage = null;
    public $currentImageIndex = 0;
    public $isViewingImages = false;
    public $totalImages = 0;
    public $showModal = false;

    // Cached properties
    public $totalAlbums;
    public $totalPhotos;
    public $featuredCount;
    public $latestYear;
    public $featuredAlbum;

    // Loading states
    public $isLoadingAlbum = false;
    public $isLoadingImage = false;

    protected $listeners = [
        'imageLoaded' => 'handleImageLoaded'
    ];

    public function mount()
    {
        // Cache statistics for 1 hour
        $this->totalAlbums = Cache::remember('gallery_total_albums', 3600, function () {
            return Album::where('status', 'published')->count();
        });

        $this->totalPhotos = Cache::remember('gallery_total_photos', 3600, function () {
            return Album::where('status', 'published')->sum('images_count');
        });

        $this->featuredCount = Cache::remember('gallery_featured_count', 3600, function () {
            return Album::where('status', 'published')->count();
        });

        // Cache featured album for 30 minutes
        $this->featuredAlbum = Cache::remember('gallery_featured_album', 1800, function () {
            return Album::where('status', 'published')
                ->latest()
                ->first();
        });

        if ($this->featuredAlbum) {
            $this->latestYear = $this->featuredAlbum->created_at->format('Y');
        }
    }

    public function viewAlbum($albumId)
    {
        $this->isLoadingAlbum = true;

        try {
            $this->selectedAlbum = Album::with(['images' => function ($query) {
                $query->orderBy('order')->select('id', 'album_id', 'image_path', 'title');
            }])->findOrFail($albumId);

            if (!$this->selectedAlbum) {
                throw new \Exception('Album not found');
            }

            $this->isViewingImages = true;
            $this->totalImages = $this->selectedAlbum->images->count();
        } catch (\Exception $e) {
            $this->addError('album', 'Unable to load album.');
            $this->closeAlbum();
        } finally {
            $this->isLoadingAlbum = false;
        }
    }

    public function viewImage($imageId)
    {
        if (!$this->selectedAlbum) {
            $this->addError('album', 'No album selected.');
            return;
        }

        $this->isLoadingImage = true;

        try {
            $this->currentImageIndex = $this->selectedAlbum->images->search(function ($image) use ($imageId) {
                return $image->id === $imageId;
            });

            if ($this->currentImageIndex === false) {
                throw new \Exception('Image not found in album');
            }

            $this->selectedImage = $this->selectedAlbum->images[$this->currentImageIndex];

            // Preload next image
            if ($this->currentImageIndex < $this->totalImages - 1) {
                $nextImage = $this->selectedAlbum->images[$this->currentImageIndex + 1];
                $this->dispatch('preloadImage', ['url' => $nextImage->image_path]);
            }
        } catch (\Exception $e) {
            $this->addError('image', 'Unable to load image.');
            $this->closeImage();
        } finally {
            $this->isLoadingImage = false;
        }
    }

    public function nextImage()
    {
        if (!$this->selectedAlbum || !$this->selectedImage) {
            return;
        }

        if ($this->currentImageIndex < $this->totalImages - 1) {
            $this->isLoadingImage = true;
            $this->currentImageIndex++;
            $this->selectedImage = $this->selectedAlbum->images[$this->currentImageIndex];

            // Preload next image
            if ($this->currentImageIndex < $this->totalImages - 1) {
                $nextImage = $this->selectedAlbum->images[$this->currentImageIndex + 1];
                $this->dispatch('preloadImage', ['url' => $nextImage->image_path]);
            }
        }
    }

    public function previousImage()
    {
        if (!$this->selectedAlbum || !$this->selectedImage) {
            return;
        }

        if ($this->currentImageIndex > 0) {
            $this->isLoadingImage = true;
            $this->currentImageIndex--;
            $this->selectedImage = $this->selectedAlbum->images[$this->currentImageIndex];

            // Preload previous image
            if ($this->currentImageIndex > 0) {
                $prevImage = $this->selectedAlbum->images[$this->currentImageIndex - 1];
                $this->dispatch('preloadImage', ['url' => $prevImage->image_path]);
            }
        }
    }

    public function handleImageLoaded()
    {
        $this->isLoadingImage = false;
    }

    public function closeImage()
    {
        $this->selectedImage = null;
        $this->currentImageIndex = 0;
        $this->isLoadingImage = false;
    }

    public function closeAlbum()
    {
        $this->selectedAlbum = null;
        $this->selectedImage = null;
        $this->isViewingImages = false;
        $this->currentImageIndex = 0;
        $this->totalImages = 0;
        $this->isLoadingAlbum = false;
        $this->isLoadingImage = false;
    }

    public function closeGallery()
    {
        $this->showModal = false;
        $this->selectedAlbum = null;
        $this->isViewingImages = false;
        $this->selectedImage = null;
        $this->isLoadingAlbum = false;
        $this->isLoadingImage = false;
    }

    public function render()
    {
        return view('livewire.pages.website.gallery.gallery-view', [
            'albums' => Album::where('status', 'published')
                ->withCount('images')
                ->latest()
                ->paginate(12)
        ]);
    }

    public function dehydrate()
    {
        // Dispatch JavaScript for image optimization
        $this->dispatch('initializeImageOptimization');
    }
}
