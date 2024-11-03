<?php

namespace App\Livewire\Pages\Dashboard\Team;

use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditLivewire extends Component
{

    use WithFileUploads;

    public $name;
    public $title;
    public $bio;
    public $profile;
    public $newProfile;
    public $linkedin;
    public $facebook;
    public $instagram;
    public $twitter;
    public $status;

    public $team, $team_id;


    protected $rules = [
        'name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'bio' => 'required|string',
    ];



    public function mount($id)
    {
        $this->team = Team::findOrFail($id);
        $this->team_id = $id;

        $this->name = $this?->team->name;
        $this->title = $this->team?->title;
        $this->bio = $this->team?->bio;
        $this->profile = $this->team?->profile;
        $this->linkedin = $this->team->linkedin;
        $this->facebook = $this->team->facebook;
        $this->instagram = $this->team->instagram;
        $this->twitter = $this->team->twitter;
        $this->status = $this->team->status;
    }

    public function store()
    {
        $this->validate();
        try {
            $team =  Team::updateOrCreate(['id' => $this->team_id], [
                'name' => $this->name,
                'title' => $this->title,
                'bio' => $this->bio,
                'linkedin' => $this->linkedin,
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'twitter' => $this->twitter,
                'status' => $this->status,
            ]);

            if ($this->newProfile) {
                $this->newProfile = $this->newProfile->store('/', 'TeamThumbnail');
                $imageUrl = Storage::disk('TeamThumbnail')->url($this->newProfile);
                $team?->update(['profile' => $imageUrl]);
            }

            session()->flash('success', 'Team successfully created.');

            return redirect()->route('dashboard.team.edit', array('id' => $team?->id));
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', $th->getMessage());
        }
        return $this->redirect(url()->previous(), navigate: true);
    }

    public function DeleteItem()
    {
        try {
            $this->team?->delete();
            return redirect()->route('dashboard.team.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.team.edit-livewire');
    }
}
