<?php

namespace App\Livewire\Pages\Website\Trainings;

use Livewire\Component;
use App\Models\training;

class Trainingsview extends Component
{

    public $trainings;
    public function mount()
    {
        $this->trainings = training::where('status','published')->get();
    }
    public function render()
    {
        return view('livewire.pages.website.trainings.trainingsview');
    }
}
