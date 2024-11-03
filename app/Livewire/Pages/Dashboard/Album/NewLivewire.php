<?php

namespace App\Livewire\Pages\Dashboard\Album;

use App\Models\Album;
use App\Models\GalleryImage;
use App\Services\StorageService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewLivewire extends Component
{


    use WithFileUploads;

    public $name;
    public $description;
    public $status = 'draft';
    public $cover_image;
    public $images = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|in:draft,published',
        'cover_image' => 'nullable|image|max:10240', // 10MB max for initial upload
    ];

    protected $messages = [
        'cover_image.max' => 'The cover image must not be larger than 10MB.',
    ];

    public $openModel;


    public function toggleModel()
    {
        $this->openModel = true;
    }


    public function closeModal()
    {
        $this->openModel = false;
    }




    public function updatedImages()
    {
        $this->validate([
            'images.*' => 'image|max:5120',
        ]);
    }

    public function removeImage($index)
    {
        unset($this->images[$index]);
        $this->images = array_values($this->images);
    }

    public function save()
    {
        $this->validate();

        try {
            // Create album
            $album = Album::create([
                'name' => $this->name,
                'description' => $this->description,
                'status' => $this->status,
            ]);

            // Handle cover image
            if ($this->cover_image) {
                $path = $this->cover_image->store('/', 'AlbumThumbnail');
                $imageUrl = Storage::disk('AlbumThumbnail')->url($path);
                $album->update(['cover_image' => $imageUrl]);
                StorageService::refreshStorageLink();
            }
            session()->flash('message', 'Album created successfully.');
            return $this->redirect(route('dashboard.albums.edit', ['id' => $album->id]), navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'Error creating album: ' . $e->getMessage());
            return $this->redirect(url()->previous(), navigate: true);

        }
    }
    public function render()
    {
        return view('livewire.pages.dashboard.album.new-livewire');
    }
}
