<?php

namespace App\Livewire\Pages\Dashboard\Applications\Admin;

use App\Models\Applicant;
use Livewire\Component;
use Livewire\WithPagination;

class ViewLivewire extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $page;




    public $applicationStatusFilter;
    public
        $training_id;
    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'id'],
        'sortDirection' => ['except' => 'asc'],
        'page' => ['except' => 1],
        'applicationStatusFilter'
    ];


    public $name, $email, $telephone, $address, $date_of_birth, $gender, $passport;
    public  $degree, $school, $field, $graduation, $skills, $experience, $language;
    public  $resume, $portfolio, $linkedin, $github;
    public $applicant, $status;

    public function sortByC($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortBy = $field;
    }



    public $openModel;

    public function toggleModel()
    {
        $this->openModel = true;
    }

    public function closeModal()
    {
        $this->openModel = false;
    }


    public function Modify($id)
    {

        $applicant = Applicant::where('user_id', $id)->where('training_id',  $this->training_id)->first();
        $this->applicant = $applicant;
        $this->name = $applicant->name;
        $this->email = $applicant->email;
        $this->telephone = $applicant->telephone;
        $this->address = $applicant->address;
        $this->date_of_birth = $applicant->date_of_birth;
        $this->gender = $applicant->gender;
        $this->passport = $applicant->passport;
        $this->degree = $applicant->degree;
        $this->school = $applicant->school;
        $this->field = $applicant->field;
        $this->graduation = $applicant->graduation;
        $this->skills = $applicant->skills;
        $this->experience = $applicant->experience;
        $this->language = $applicant->language;
        $this->resume = $applicant->resume;
        $this->portfolio = $applicant->portfolio;
        $this->linkedin = $applicant->linkedin;
        $this->github = $applicant->github;
        $this->status = $applicant->status;

        $this->toggleModel();
    }



    public function mount($training_id)
    {

        $this->training_id = $training_id;
    }

    public function UpdateStatus()
    {
        $this->applicant?->update(['application_status' => $this->status]);
        $this->closeModal();
    }
    public function render()
    {

        $query = Applicant::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->orWhere('name', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')->orWhere('created_at
                ', 'like', '%' . $this->search . '%');
            });

            $totalResults = $query->count();
            $perPage = min($totalResults, 100);
        } else {
            $perPage = $this->perPage;
        }

        $data = $query->orderBy($this->sortBy, $this->sortDirection)
            ->where('training_id', $this->training_id)
            ->when($this->applicationStatusFilter, function ($query) {
                $query->where('application_status', $this->applicationStatusFilter);
            })
            ->paginate($perPage);


        return view('livewire.pages.dashboard.applications.admin.view-livewire', [
            'data' => $data
        ]);
    }
}
