<?php

namespace App\Livewire\Pages\Dashboard\Applications;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingsLivewire extends Component
{
    use WithFileUploads;

    public $name, $email, $telephone, $address, $date_of_birth, $gender, $passport;
    public $Newdegree, $degree, $school, $field, $graduation, $skills, $experience, $language;
    public $Newresume, $resume, $portfolio, $linkedin, $github;
    public $user;
    public function mount($user)
    {
        $this->user = $user;
        $applicant = $user;
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
    }

    public function submit()
    {
        $applicant = $this->user;

        if ($this->Newresume) {
            $this->Newresume = $this->Newresume->store('/' . $this->email . '/', 'ApplicantsAssets');
            $resumePath = Storage::disk('ApplicantsAssets')->url($this->Newresume);
        }

        if ($this->Newdegree) {
            $this->Newdegree = $this->Newdegree->store('/' . $this->email . '/', 'ApplicantsAssets');
            $degreePath = Storage::disk('ApplicantsAssets')->url($this->Newdegree);
        }

        $applicant->update([
            'name' => $this->name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'address' => $this->address,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'passport' => $this->passport,
            'degree' => $degreePath ?? $this->degree,
            'school' => $this->school,
            'field' => $this->field,
            'graduation' => $this->graduation,
            'skills' => $this->skills,
            'experience' => $this->experience,
            'language' => $this->language,
            'resume' => $resumePath ?? $this->resume,
            'portfolio' => $this->portfolio,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
        ]);

        session()->flash('message', 'Application updated successfully.');
    }

    public function render()
    {
        return view('livewire.pages.dashboard.applications.settings-livewire');
    }
}
