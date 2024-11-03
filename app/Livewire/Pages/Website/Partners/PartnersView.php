<?php

namespace App\Livewire\Pages\Website\Partners;

use Livewire\Component;
use App\Models\Partners;

class PartnersView extends Component
{
    public $partners;
    public function mount()
    {
        $this->partners = Partners::where('status','published')->get();
    }
    public function render()
    {
        return view('livewire.pages.website.partners.partners-view');
    }
}


