<?php

namespace App\Livewire\Pages\Dashboard\Courses;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewLivewire extends Component
{

    use WithFileUploads;
    public $title, $featured_image, $course_id;
    public $openModel;

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
        $this->featured_image = '';
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'featured_image' => 'nullable|image|max:1024'
        ]);


        try {
            $course = Course::updateOrCreate(['id' => $this->course_id], ['title' => $this->title, 'featured_image' => 'https://via.placeholder.com/640x480.png/A41916?text=' . $this->title]);

            if ($this->featured_image) {
                $this->featured_image = $this->featured_image->store('/', 'CourseThumbnail');
                $imageUrl = Storage::disk('CourseThumbnail')->url($this->featured_image);
                $course?->update(['featured_image' => $imageUrl]);
            }

            session()->flash('message', $this->course_id ? 'Course Updated Successfully.' : 'Course Created Successfully.');

            $this->closeModal();
            $this->resetInputFields();
            return redirect()->route('dashboard.course.edit', array('id' => $course?->id));
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.courses.new-livewire');
    }
}
