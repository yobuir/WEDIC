<?php

namespace App\Livewire\Pages\Website\Blogs;

use App\Models\blog;
use Livewire\Component;

class BlogsView extends Component
{

    public $blogs;
    public function mount()
    {
        $this->blogs = blog::where('status','published')->get();
    }
    public function render()
    {
        return view('livewire.pages.website.blogs.blogs-view');
    }
}




