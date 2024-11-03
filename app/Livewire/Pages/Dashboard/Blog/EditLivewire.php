<?php

namespace App\Livewire\Pages\Dashboard\Blog;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditLivewire extends Component
{
    use WithFileUploads;
    public $title, $description, $blog_id, $featured_image, $newFeatured_image, $header, $category_id, $categories, $blog, $status;
    public $openModel;

    public function  mount($id)
    {
        $this->blog = Blog::firstWhere(['id' => $id]);
        $this->blog_id=$id;
        $this->title = $this->blog->title;
        $this->description = $this->blog->description;
        $this->featured_image = $this->blog->featured_image;
        $this->category_id = $this->blog->category_id;
        $this->status = $this->blog->status;

        $this->categories = Category::where('status', 'published')->get();
    }
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

    public function modify()
    {
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->blog_id = '';
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'category_id' => 'required',
            'newFeatured_image' => 'nullable|image|max:1024',
        ]);

        try {
            $blog = Blog::updateOrCreate(['id' => $this->blog_id], ['title' => $this->title, 'category_id' => $this->category_id, 'featured_image' => 'https://via.placeholder.com/640x480.png/A41916?text='.$this->title, 'status' => $this->status]);

            if ($this->newFeatured_image) {
                $this->newFeatured_image = $this->newFeatured_image->store('/', 'BlogThumbnail');
                $imageUrl = Storage::disk('BlogThumbnail')->url($this->newFeatured_image);
                $blog?->update(['featured_image' => $imageUrl]);
            }

            session()->flash('message', $this->blog_id ? 'Blog Updated Successfully.' : 'Blog Created Successfully.');
            $this->closeModal();
            $this->resetInputFields();
            return redirect()->route('dashboard.blog.edit', array('id' => $blog?->id));
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }
    public function DeleteItem()
    {
        try {
            $this->blog?->delete();
            return redirect()->route('dashboard.blog.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }


    public function render()
    {
        return view('livewire.pages.dashboard.blog.edit-livewire');
    }
}
