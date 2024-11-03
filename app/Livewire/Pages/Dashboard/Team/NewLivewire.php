<?php

namespace App\Livewire\Pages\Dashboard\Team;

use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewLivewire extends Component
{

    use WithFileUploads;
    public $openModel;

    public $name;
    public $title;
    public $bio;
    public $profile;
    public $linkedin;
    public $facebook;
    public $instagram;
    public $twitter;



    protected $rules = [
        'name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'bio' => 'required|string',
        'profile' => 'required'
    ];


    public function submit()
    {
        $this->validate();
        try {
            $team =  Team::create([
                'name' => $this->name,
                'title' => $this->title,
                'bio' => $this->bio,
                'profile' => $this->profile,
                'linkedin' => $this->linkedin,
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'twitter' => $this->twitter,
                'status' => 'published',
            ]);

            if ($this->profile) {
                $this->profile = $this->profile->store('/', 'TeamThumbnail');
                $imageUrl = Storage::disk('TeamThumbnail')->url($this->profile);
                $team?->update(['profile' => $imageUrl]);
            }

            session()->flash('success', 'Team successfully created.');
            $this->closeModal();
            return redirect()->route('dashboard.team.edit', array('id' => $team?->id));
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }
        return $this->redirect(url()->previous(), navigate: true);
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


    public function render()
    {
        return view('livewire.pages.dashboard.team.new-livewire');
    }
}
