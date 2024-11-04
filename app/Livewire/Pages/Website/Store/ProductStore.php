<?php

namespace App\Livewire\Pages\Website\Store;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductStore extends Component
{

    use WithPagination;

    public $search = '';
    public $category = '';
    public $sorting = 'name';
    public $direction = 'asc';
    public $selectedProduct = null;
    public $currentImageIndex = 0;

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'sorting' => ['except' => 'name'],
        'direction' => ['except' => 'asc']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showProductDetails($productId)
    {
        $this->selectedProduct = Product::with('images')->find($productId);
        $this->currentImageIndex = 0;
        $this->dispatch('open-modal');
    }

    public function nextImage()
    {
        if ($this->selectedProduct) {
            $maxIndex = $this->selectedProduct->images->count() - 1;
            $this->currentImageIndex = $this->currentImageIndex >= $maxIndex ? 0 : $this->currentImageIndex + 1;
        }
    }

    public function previousImage()
    {
        if ($this->selectedProduct) {
            $maxIndex = $this->selectedProduct->images->count() - 1;
            $this->currentImageIndex = $this->currentImageIndex <= 0 ? $maxIndex : $this->currentImageIndex - 1;
        }
    }

    public function render()
    {
        $products = Product::with(['primaryImage', 'images'])
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->category, function ($query) {
                $query->where('category_id', $this->category);
            })
            ->orderBy($this->sorting, $this->direction)
            ->where('status', '!=', 'draft')
            ->paginate(12);

        return view('livewire.pages.website.store.product-store', [
            'products' => $products,
            'categories' => Category::all(),
            'categoriesCount' => Category::count(),
            'productsAvailableCount' => Product::where('status', 'available')->count(),
            'productsSoldCount' => Product::where('status', 'sold')->count(),

        ]);
    }
}
