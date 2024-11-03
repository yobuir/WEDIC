<?php

namespace App\Livewire\Pages\Dashboard\Trainings;

use App\Models\Category;
use App\Models\Training;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewLivewire extends Component
{
    use WithFileUploads;
    public $title, $description, $training_id, $featured_image, $header, $availability, $type,$category_id, $categories;
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
        $this->training_id = '';
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'category_id' => 'required',
            'featured_image' => 'nullable|image|max:1024',
            'availability'=>'required',
            'type'=>'required'
        ]);

        try {
            $training = Training::updateOrCreate(['id' => $this->training_id], ['title' => $this->title, 'category_id' => $this->category_id, 'description' => $this->description, 'featured_image' => 'https://via.placeholder.com/640x480.png/A41916?text='. $this->title, 'header' => $this->title, 'content' => $this->title,
                'availability'=>$this->availability, 'type'=>$this->type]);

            if ($this->featured_image) {
                $this->featured_image = $this->featured_image->store('/', 'TrainingThumbnail');
                $imageUrl = Storage::disk('TrainingThumbnail')->url($this->featured_image);
                $training?->update(['featured_image' => $imageUrl]);
            }

            session()->flash('message', $this->training_id ? 'Training Updated Successfully.' : 'Training Created Successfully.');

            $this->closeModal();
            $this->resetInputFields();
            return redirect()->route('dashboard.training.edit', array('id' => $training?->id));
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.trainings.new-livewire');
    }
}
