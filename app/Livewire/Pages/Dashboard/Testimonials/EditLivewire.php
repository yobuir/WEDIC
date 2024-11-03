<?php

namespace App\Livewire\Pages\Dashboard\Testimonials;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditLivewire extends Component
{


    use WithFileUploads;

    public $testimonial_id;
    public $name;
    public $email;
    public $role;
    public $profile;
    public $newProfile;
    public $phone;
    public $message;
    public $status;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'role' => 'required',
        'phone' => 'nullable|string',
        'message' => 'required|min:10',
        'newProfile' => 'nullable|image|max:1024', // 1MB Max
    ];

    public function mount($id)
    {
        $this->testimonial_id = $id;

        $testimonial = Testimonial::firstWhere(['id' => $id]);
        if (!$testimonial) {

            abort(404);
        }

        $this->name = $testimonial->name;
        $this->email = $testimonial->email;
        $this->role = $testimonial->role;
        $this->profile = $testimonial->profile;
        $this->phone = $testimonial->phone;
        $this->message = $testimonial->message;
        $this->status = $testimonial->status;
    }
    public function store()
    {
        $this->validate();

        try {
            $testimonial = Testimonial::updateOrCreate(
                ['id' => $this->testimonial_id],
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'role' => $this->role,
                    'phone' => $this->phone,
                    'message' => $this->message,
                    'status'=>$this->status,
                    'profile' => 'https://via.placeholder.com/640x480.png/A41916?text=' . $this->name,
                ]
            );

            if ($this->newProfile) {
                $this->newProfile = $this->newProfile->store('/', 'ProfileThumbnail');
                $imageUrl = Storage::disk('ProfileThumbnail')->url($this->newProfile);
                $testimonial?->update(['profile' => $imageUrl]);
            }

            session()->flash(
                'message',
                $this->testimonial_id ? 'Testimonial updated successfully.' : 'Testimonial created successfully.'
            );

            return redirect()->route('dashboard.testimonials.edit', array('id' => $testimonial?->id));
        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', 'Error saving testimonial: ' . $e->getMessage());

            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function deleteProfile()
    {
        if ($this->profile) {
            Storage::disk('ProfileThumbnail')->delete($this->profile);
            $this->profile = null;
        }
        Testimonial::find($this->testimonial_id)?->delete();
        session()->flash('message', 'Testimonial removed successfully.');

        return redirect()->route('dashboard.testimonials.');

    }

    public function render()
    {
        return view('livewire.pages.dashboard.testimonials.edit-livewire');
    }
}
