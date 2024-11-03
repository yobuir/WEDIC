<?php

namespace App\Livewire\Pages\Dashboard\Partners;

use App\Models\Partners;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewLivewire extends Component
{
    use WithFileUploads;
    public $openModel, $name, $logo, $url;
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
    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $partner = Partners::create(['name' => $this->name, 'logo' => 'https://via.placeholder.com/640x480.png/00aa55?text=' . $this->name, 'url' => $this->url]);
        if ($this->logo) {
            $this->logo = $this->logo->store('/', 'PartnersLogo');
            $imageUrl = Storage::disk('PartnersLogo')->url($this->logo);
            $partner?->update(['logo' => $imageUrl]);

        }

        $this->logo = null;
        $this->name = null;
        $this->url = null;
        $this->closeModal();
    }


    public function render()
    {
        return view('livewire.pages.dashboard.partners.new-livewire');
    }
}
