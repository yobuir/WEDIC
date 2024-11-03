<?php

namespace App\Livewire\Pages\Dashboard\Projects;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditLivewire extends Component
{
    use WithFileUploads;
    public $title, $description, $project_id, $featured_image, $newFeatured_image, $header, $category_id, $categories, $project, $status;

    public $start_date, $end_date, $location, $category, $partners, $coordinator, $budget, $currency;
    public $openModel;

    public function mount($id)
    {
        $this->project = Project::firstWhere(['id' => $id]);
        $this->project_id = $id;
        $this->title = $this->project->title;
        $this->description = $this->project->description;
        $this->featured_image = $this->project->featured_image;
        $this->category_id = $this->project->category_id;
        $this->status = $this->project->status;
        $this->start_date = $this->project->start_date;
        $this->end_date = $this->project->end_date;
        $this->location = $this->project->location;
        $this->partners = $this->project->partners;
        $this->coordinator = $this->project->coordinator;
        $this->budget = $this->project->budget;
        $this->currency = $this->project->currency;

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
        $this->project_id = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'category_id' => 'required',
            'newFeatured_image' => 'nullable|image|max:1024',
        ]);

        try {
            $project = Project::updateOrCreate(['id' => $this->project_id], [
                'title' => $this->title,
                'category_id' => $this->category_id,
                'featured_image' => 'https://via.placeholder.com/640x480.png/A41916?text=' . $this->title,
                'status' => $this->status,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'location' => $this->location,
                'partners' => $this->partners,
                'coordinator' => $this->coordinator,
                'budget' => $this->budget,
                'currency' => $this->currency,
            ]);

            if ($this->newFeatured_image) {
                $this->newFeatured_image = $this->newFeatured_image->store('/', 'projectThumbnail');
                $imageUrl = Storage::disk('projectThumbnail')->url($this->newFeatured_image);
                $project?->update(['featured_image' => $imageUrl]);
            }

            session()->flash('message', $this->project_id ? 'Project Updated Successfully.' : 'Project Created Successfully.');
            $this->closeModal();
            $this->resetInputFields();
            return redirect()->route('dashboard.project.edit', ['id' => $project?->id]);
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function DeleteItem()
    {
        try {
            $this->project?->delete();
            return redirect()->route('dashboard.project.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.projects.edit-livewire');
    }
}
