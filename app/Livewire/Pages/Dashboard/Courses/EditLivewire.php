<?php

namespace App\Livewire\Pages\Dashboard\Courses;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditLivewire extends Component
{
    use WithFileUploads;
    public $newFeatured_image, $featured_image, $title, $description, $status, $resources, $newResources, $course_id, $course;

    public function  mount($id)
    {
        $this->course = Course::firstWhere(['id' => $id]);
        $this->course_id = $this->course->id;
        $this->title = $this->course?->title;
        $this->description = $this->course?->description;
        $this->featured_image = $this->course?->featured_image;
        $this->resources = $this->course?->resources;
        $this->status = $this->course?->status;
        // dd($this->resources);
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'newFeatured_image' => 'nullable|image|max:1024'
        ]);

        try {
            $course = Course::updateOrCreate(['id' => $this->course_id], ['title' => $this->title, 'description' => $this->description]);

            if ($this->newFeatured_image) {
                $this->newFeatured_image = $this->newFeatured_image->store('/', 'CourseThumbnail');
                $imageUrl = Storage::disk('CourseThumbnail')->url($this->newFeatured_image);
                $course?->update(['featured_image' => $imageUrl]);
            }

            if ($this->newResources) {
                $filePaths = [];
                foreach ($this->newResources as $photo) {
                    $photo_img = $photo->store('/', 'CourseResources');
                    $filePaths[] = Storage::disk('CourseResources')->url($photo_img);
                }
                $filePaths = json_encode($filePaths);
            } else {
                $filePaths = $this->photos;
            }
            $course = $course?->update(['resources' => $filePaths]);
            session()->flash('message', $this->course_id ? 'Course Updated Successfully.' : 'Course Created Successfully.');

            return redirect()->route('dashboard.course.');
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }



    public function DeleteItem()
    {
        try {
            $this->course?->delete();
            return redirect()->route('dashboard.course.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.courses.edit-livewire');
    }
}
