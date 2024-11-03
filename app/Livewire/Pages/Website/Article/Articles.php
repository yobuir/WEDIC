<?php

namespace App\Livewire\Pages\Website\Article;

use App\Models\blog;
use Livewire\Component;

class Articles extends Component

{
    public $item;
    public function mount($blog)
    {

        $this->item = $blog;
        if (!$this->item) {
            abort(404);
        }
    }
    public function render()
    {
        return view('livewire.pages.website.article.articles');
    }
}
