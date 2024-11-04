<?php

namespace App\Livewire\Pages\Dashboard\Store;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductStore extends Component
{
    use WithFileUploads;
    public $openModel,
        $name,
        $featured_image,
        $newThumbnail,
        $price,
        $currency,
        $quantity,
        $measurement_unit,
        $category_id,
        $featured,
        $status, $product, $existingMedia;

    public $photos = [];

    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
        $this->name = $this->product->name;
        $this->featured_image = $this->product->featured_image;
        $this->price = $this->product->price;
        $this->currency = $this->product->currency;
        $this->quantity = $this->product->quantity;
        $this->measurement_unit = $this->product->measurement_unit;
        $this->category_id = $this->product->category_id;
        $this->featured = $this->product->featured;
        $this->status = $this->product->status;
        $this->loadExistingMedia();
    }


    protected function loadExistingMedia()
    {
        // Load images
        $this->existingMedia['images'] = ProductImage::where('product_id', $this->product?->id)
            ->where('type', 'image')
            ->orderBy('order')
            ->get()
            ->map(function ($media) {
                return [
                    'id' => $media->id,
                    'url' => $media->image_url,
                    'is_primary' => $media->is_primary,
                    'title' => $media->title,
                    'order' => $media->order
                ];
            })->toArray();
    }

    public function removeExistingMedia($mediaId)
    {
        $media = ProductImage::where('product_id', $this->product?->id)
            ->where('id', $mediaId)
            ->first();

        if ($media) {
            Storage::disk('ProductImages')->delete($media->path);

            if ($media->thumbnail_path) {
                Storage::disk('ProductImages')->delete($media->thumbnail_path);
            }

            $media->delete();
            $this->loadExistingMedia();
        }
    }

    public function removeNewPhoto($index)
    {
        if (isset($this->photos[$index])) {
            unset($this->photos[$index]);
            $this->photos = array_values($this->photos);
        }
    }

    protected function handleMediaUpload($file, $type, $order)
    {
        $path = $file->store('/', 'ProductImages');
        $filename = basename($path);

        $mediaData = [
            'product_id' =>$this->product?->id,
            'type' => $type,
            'original_name' => $file->getClientOriginalName(),
            'file_name' => $filename,
            'path' => $path,
            'image_url' => Storage::disk('ProductImages')->url($path),
            'sort_order' => $order,
            'title' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
            'alt_text' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
            'size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
            'status' => 'active'
        ];

        if ($type === 'image') {
            $mediaData['is_primary'] = ($order === 0 && empty($this->existingMedia['images']));
        }

        return ProductImage::create($mediaData);
    }



    public function store()
    {

        $this->validate([
            'name' => 'required',
        ]);

        try {
            $this->product?->update([
                'name' => $this->name,
                'price' => $this->price,
                'currency' => $this->currency,
                'quantity' => $this->quantity,
                'measurement_unit' => $this->measurement_unit,
                'category_id' => $this->category_id,
                'featured' => $this->featured,
                'status' => $this->status
            ]);
            if ($this->newThumbnail) {
                $this->newThumbnail = $this->newThumbnail->store('/', 'ProductThumbnail');
                $imageUrl = Storage::disk('ProductThumbnail')->url($this->newThumbnail);
                $this->product?->update(['featured_image' => $imageUrl]);
            }

            if (!empty($this->photos)) {
                $currentMaxOrder = ProductImage::where('product_id', $this->product?->id)
                    ->where('type', 'image')
                    ->max('order') ?? -1;

                foreach ($this->photos as $index => $photo) {
                    $this->handleMediaUpload($photo, 'image', $currentMaxOrder + $index + 1);
                }
            }
            return redirect()->route('dashboard.store');
        } catch (\Throwable $th) {

            dd($th);
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }


    public function DeleteItem()
    {
        try {
            $this->product?->delete();
            return redirect()->route('dashboard.store');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.store.product-store',
    [
        'categories'=>Category::all()
    ]);
    }
}
