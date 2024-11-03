<?php

namespace App\Livewire\Pages\Dashboard\Album;

use App\Models\Album;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AppLivewire extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function deleteAlbum($albumId)
    {
        try {
            $album = Album::with('images')->findOrFail($albumId);

            // Delete all images associated with the album
            foreach ($album->images as $image) {
                Storage::disk('AlbumThumbnail')->delete($image->image_path);
            }

            // Delete cover image
            if ($album->cover_image) {
                Storage::disk('AlbumThumbnail')->delete($album->cover_image);
            }

            $album->delete();
            session()->flash('message', 'Album deleted successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting album: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $albums = Album::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->withCount('images')
            ->paginate(12);

        return view('livewire.pages.dashboard.album.app-livewire',compact('albums'));
    }
}
