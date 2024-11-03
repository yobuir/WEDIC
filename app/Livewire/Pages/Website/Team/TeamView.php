<?php

namespace App\Livewire\Pages\Website\Team;

use App\Models\Team;
use Livewire\Component;

class TeamView extends Component
{
    public $members;

    public function mount()
    {
        $this->members = Team::where('status', 'published')->get();
    }

    public function render()
    {
        return view('livewire.pages.website.team.team-view');
    }
}
