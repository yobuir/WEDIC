<?php

namespace App\Livewire\Pages\Dashboard\Partners;

use App\Models\Partners;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditLivewire extends Component
{

    use WithFileUploads;
    public $openModel, $name, $logo, $newLogo, $url, $status, $partner;

    public function mount($id)
    {
        $this->partner = Partners::findOrFail($id);
        $this->name = $this->partner->name;
        $this->url = $this->partner->url;
        $this->logo = $this->partner->logo;
        $this->status = $this->partner->status;
    }

    public function store()
    {

        $this->validate([
            'name' => 'required',
        ]);

        try {
            $this->partner?->update(['name' => $this->name, 'url' => $this->url, 'status' => $this->status]);
            if ($this->newLogo) {
                $this->newLogo = $this->newLogo->store('/', 'PartnersLogo');
                $imageUrl = Storage::disk('PartnersLogo')->url($this->newLogo);
                $this->partner?->update(['logo' => $imageUrl]);
            }
            return redirect()->route('dashboard.partners.');
        } catch (\Throwable $th) {

            dd($th);
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }


    public function DeleteItem()
    {
        try {
            $this->partner?->delete();
            return redirect()->route('dashboard.partners.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.pages.dashboard.partners.edit-livewire');
    }
}
