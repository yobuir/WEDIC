<?php

namespace App\Livewire\Pages\Dashboard\Event;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditLivewire extends Component
{

    use WithFileUploads;
    public $title, $description, $event_id, $featured_image, $newFeatured_image, $header, $category_id, $categories, $event, $status,
        $date,
        $location,
        $organizer,
        $link,
        $featured,
        $cost,
        $end_date;
    public $files = [], $existingFiles = [], $existingFileNames = [];
    public $openModel;





    public function  mount($id)
    {
        $this->event = Event::firstWhere(['id' => $id]);
        $this->event_id = $id;
        $this->title = $this->event->title;
        $this->description = $this->event->description;
        $this->featured_image = $this->event->featured_image;
        $this->category_id = $this->event->category_id;
        $this->status = $this->event->status;
        $this->date=$this->event->date;

        $this->end_date = $this->event->end_date;
        $this->location=$this->event->location;
        $this->organizer=$this->event->organizer;
        $this->link=$this->event->link;
        $this->featured=$this->event->featured;
        $this->cost=$this->event->cost;
        $this->featured=$this->event->featured;

          $this->existingFiles = json_decode($this->event->files ?? '[]', true) ?? [];
        $this->existingFileNames = json_decode($this->event->file_names ?? '[]', true) ?? [];

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
        $this->event_id = '';
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'category_id' => 'required',
            'newFeatured_image' => 'nullable|image|max:1024',
        ]);

        try {

            $fileUrls = [];
            $fileNames = [];

            // Handle multiple file uploads
            if (!empty($this->files)) {
                foreach ($this->files as $file) {
                    // Generate a unique filename
                    $originalName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $filename = pathinfo($originalName, PATHINFO_FILENAME);
                    $uniqueFileName = $filename . '_' . time() . '.' . $extension;

                    // Store the file
                    $path = $file->storeAs('/', $uniqueFileName, 'EventFiles');
                    $fileUrl = Storage::disk('EventFiles')->url($path);

                    $fileUrls[] = $fileUrl;
                    $fileNames[] = $originalName;
                }
            }
            // Merge new files with existing ones, ensuring arrays are not null
            $allFiles = array_merge($this->existingFiles ?? [], $fileUrls);
            $allFileNames = array_merge($this->existingFileNames ?? [], $fileNames);


            $event = event::updateOrCreate(['id' => $this->event_id], [
                'title' => $this->title,
                'category_id' => $this->category_id,
                'status' => $this->status,
                'date' => $this->date,
                'end_date' => $this->end_date,
                'location' => $this->location,
                'organizer' => $this->organizer,
                'link' => $this->link,
                'featured' => $this->featured,
                'cost' => $this->cost,
                'files' => json_encode(array_values($allFiles)), // Reindex array
                'file_names' => json_encode(array_values($allFileNames)) // Reindex array

            ]);

            if ($this->newFeatured_image) {
                $this->newFeatured_image = $this->newFeatured_image->store('/', 'EventThumbnail');
                $imageUrl = Storage::disk('EventThumbnail')->url($this->newFeatured_image);
                $event?->update(['featured_image' => $imageUrl]);
            }


            session()->flash('message', $this->event_id ? 'event Updated Successfully.' : 'event Created Successfully.');
            $this->closeModal();
            $this->resetInputFields();
            return redirect()->route('dashboard.event.edit', array('id' => $event?->id));
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function removeFile($index)
    {
        try {
            // Ensure arrays are initialized
            $this->existingFiles = is_array($this->existingFiles) ? $this->existingFiles : [];
            $this->existingFileNames = is_array($this->existingFileNames) ? $this->existingFileNames : [];

            if (isset($this->existingFiles[$index])) {
                // Get the file path from URL
                $filePath = parse_url($this->existingFiles[$index], PHP_URL_PATH);
                $filePath = basename($filePath);

                // Delete the file from storage
                Storage::disk('EventFiles')->delete($filePath);

                // Remove from arrays
                unset($this->existingFiles[$index]);
                unset($this->existingFileNames[$index]);

                // Reindex arrays
                $this->existingFiles = array_values($this->existingFiles);
                $this->existingFileNames = array_values($this->existingFileNames);

                // Update the event
                $this->event->update([
                    'files' => json_encode($this->existingFiles),
                    'file_names' => json_encode($this->existingFileNames)
                ]);

                session()->flash('message', 'File removed successfully.');
            }
        } catch (\Throwable $th) {
            session()->flash('error', 'Error removing file: ' . $th->getMessage());
        }
    }

    public function DeleteItem()
    {
        try {
            // Delete all associated files
            $files = json_decode($this->event->files ?? '[]', true) ?? [];
            foreach ($files as $fileUrl) {
                $filePath = basename(parse_url($fileUrl, PHP_URL_PATH));
                Storage::disk('EventFiles')->delete($filePath);
            }

            // Delete featured image if exists
            if ($this->featured_image) {
                $featuredImagePath = basename(parse_url($this->featured_image, PHP_URL_PATH));
                Storage::disk('EventThumbnail')->delete($featuredImagePath);
            }

            $this->event->delete();
            return redirect()->route('dashboard.event.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }


    public function render()
    {
        return view('livewire.pages.dashboard.event.edit-livewire');
    }
}
