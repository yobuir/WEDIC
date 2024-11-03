<?php

namespace App\Livewire\Pages\Dashboard\Applications;

use App\Models\Applicant;
use Livewire\Component;

class AppLivewire extends Component
{
    public $applications;
    public function mount(){
        $this->applications = Applicant::where('user_id', '=', auth()->user()->id)->with('training')->get();

    }
    public function render()
    {
        return view('livewire.pages.dashboard.applications.app-livewire');
    }
}
