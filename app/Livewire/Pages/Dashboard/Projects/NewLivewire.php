<?php

namespace App\Livewire\Pages\Dashboard\Projects;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewLivewire extends Component
{


    use WithFileUploads;
    public $title, $description, $project_id, $featured_image, $header, $category_id, $categories;
    public $openModel;

    public function  mount()
    {
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

    private function resetInputFields()
    {
        $this->title = '';
        $this->project_id = '';
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'category_id' => 'required',
            'featured_image' => 'nullable|image|max:1024',
        ]);

        try {
            $project = Project::updateOrCreate(['id' => $this->project_id], ['title' => $this->title, 'category_id' => $this->category_id, 'description' => $this->description, 'featured_image' => 'https://via.placeholder.com/640x480.png/A41916?text=' . $this->title, 'header' => $this->title, 'content' => $this->title]);

            if ($this->featured_image) {
                $this->featured_image = $this->featured_image->store('/', 'ProjectThumbnail');
                $imageUrl = Storage::disk('ProjectThumbnail')->url($this->featured_image);
                $project?->update(['featured_image' => $imageUrl]);
            }
            session()->flash('message', $this->project_id ? 'Blog Updated Successfully.' : 'Blog Created Successfully.');

            $this->closeModal();
            $this->resetInputFields();
            return redirect()->route('dashboard.project.edit', array('id' => $project?->id));
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.projects.new-livewire');
    }
}
