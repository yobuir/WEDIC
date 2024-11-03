<?php

namespace App\Livewire\Pages\Dashboard\Trainings;

use App\Models\Category;
use App\Models\Training;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditLivewire extends Component
{
    use WithFileUploads;
    public $title, $description, $training_id, $featured_image, $newFeatured_image, $header,  $availability, $type, $category_id, $categories, $training, $status;
    public $openModel;

    public function  mount($id)
    {
        $this->training = Training::firstWhere(['id' => $id]);
        $this->training_id = $id;
        $this->title = $this->training->title;
        $this->description = $this->training->description;
        $this->featured_image = $this->training->featured_image;
        $this->category_id = $this->training->category_id;
        $this->status = $this->training->status;
        $this->availability = $this->training->availability;
        $this->type = $this->training->type;
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
        $this->training_id = '';
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'category_id' => 'required',
            'newFeatured_image' => 'nullable|image|max:1024',
            'availability' => 'required',
            'type' => 'required'
        ]);

        try {
            $training = Training::updateOrCreate(['id' => $this->training_id], ['title' => $this->title, 'category_id' => $this->category_id, 'featured_image' => 'https://via.placeholder.com/640x480.png/A41916?text=' . $this->title, 'status' => $this->status,  'availability' => $this->availability, 'type' => $this->type]);

            if ($this->newFeatured_image) {
                $this->newFeatured_image = $this->newFeatured_image->store('/', 'TrainingThumbnail');
                $imageUrl = Storage::disk('TrainingThumbnail')->url($this->newFeatured_image);
                $training?->update(['featured_image' => $imageUrl]);
            }

            session()->flash('message', $this->training_id ? 'training Updated Successfully.' : 'training Created Successfully.');

            $this->closeModal();
            $this->resetInputFields();
            return redirect()->route('dashboard.training.edit', array('id' => $training?->id));
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }


    public function DeleteItem()
    {
        try {
            $this->training?->delete();
            return redirect()->route('dashboard.training.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }


    public function render()
    {
        return view('livewire.pages.dashboard.trainings.edit-livewire');
    }
}
