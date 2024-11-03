<?php

namespace App\Livewire\Pages\Website\TrainingsApply;

use Livewire\Component;
use App\Models\training;

class TrainingsApplyView extends Component
{
    public $item;
    public function mount($training)
    {
        $this->item = $training;
        if (!$this->item) {
            abort(404);
        }
    }
    public function render()
    {
        return view('livewire.pages.website.trainings-apply.trainings-apply-view');
    }
}
