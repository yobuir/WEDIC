<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Applicant;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Partners;
use App\Models\Payment;
use App\Models\Training;
use App\Models\User;
use Livewire\Component;

class AdminLivewire extends Component
{
    public $users;
    public $trainings;
    public $courses;
    public $partners;
    public $messages;
    public $applicants;

    public function mount()
    {

        $this->users = User::count();
        $this->trainings = Training::count();
        $this->courses = Course::count();
        $this->partners = Partners::count();
        $this->messages = Contact::count();
        $this->applicants = Applicant::count();
    }
    public function render()
    {
        return view('livewire.pages.dashboard.admin-livewire', [
            'transRecords' => Payment::where('status', 'completed')->get()->groupBy('currency')
        ]);
    }
}
