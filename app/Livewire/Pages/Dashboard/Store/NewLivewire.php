<?php

namespace App\Livewire\Pages\Dashboard\Store;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewLivewire extends Component
{

    use WithFileUploads;
    public $openModel, $name, $thumbnail, $category_id;
    public function toggleModel()
    {
        $this->openModel = true;
    }

    public function save()
    {
        $this->openModel = false;
    }


    public function closeModal()
    {
        $this->openModel = false;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'category_id' => 'required',
        ],[
            'name.required' => 'Product name is required',
            'category_id.required' => 'Product category is required',
        ]);
        try {
            $product = Product::create(['name' => $this->name, 'featured_image' => 'https://via.placeholder.com/640x480.png/00aa55?text=' . $this->name, 'category_id' => $this->category_id]);
            if ($this->thumbnail) {
                $this->thumbnail = $this->thumbnail->store('/', 'ProductThumbnail');
                $imageUrl = Storage::disk('ProductThumbnail')->url($this->thumbnail);
                $product?->update(['featured_image' => $imageUrl]);
            }

            $this->thumbnail = null;
            $this->name = null;
            $this->closeModal();

            return redirect()->route('dashboard.store.edit', array('id' => $product?->id));
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.store.new-livewire',
    [
        'categories' => Category::all(),
    ]);
    }
}
