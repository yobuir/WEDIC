<?php

namespace App\Livewire\Pages\Website\ApplyTrainings;

use App\Models\Applicant;
use App\Models\User;
use App\Notifications\Accounts\NewUserPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ApplyTraining extends Component
{
    use WithFileUploads;

    public $name, $email, $telephone, $address, $date_of_birth, $gender, $passport;
    public $degree, $school, $field, $graduation, $skills, $experience, $language;
    public $resume, $portfolio, $linkedin, $github;
    public $create_account = false;
    public $userMyData;

    public $item;
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:applicants',
        'telephone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'date_of_birth' => 'required|date',
        'gender' => 'required|in:male,female',
        'passport' => 'required|string|max:20',
        'degree' => 'required|file|max:1024',
        'school' => 'required|string|max:255',
        'field' => 'required|string|max:255',
        'graduation' => 'required|date',
        'skills' => 'required|string|max:255',
        'experience' => 'required|integer',
        'language' => 'required|string|max:255',
        'resume' => 'required|file|max:1024',
        'portfolio' => 'nullable|string|max:255',
        'linkedin' => 'nullable|string|max:255',
        'github' => 'nullable|string|max:255',
    ];


    public function submit()
    {
        $this->validate();
        if ($this->resume) {
            $this->resume = $this->resume->store('/' . $this->email . '/', 'ApplicantsAssets');
            $resumePath = Storage::disk('ApplicantsAssets')->url($this->resume);
        } else {
            $resumePath = '';
        }


        if ($this->degree) {
            $this->degree = $this->degree->store('/' . $this->email . '/', 'ApplicantsAssets');
            $degreePath = Storage::disk('ApplicantsAssets')->url($this->degree);
        } else {
            $degreePath = '';
        }

        $applicant = Applicant::updateOrCreate(['training_id' => 2, 'user_id' => auth()->user()->id ?? -1], [
            'training_id' => $this->item?->id,
            'name' => $this->name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'address' => $this->address,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'passport' => $this->passport,
            'degree' => $degreePath,
            'school' => $this->school,
            'field' => $this->field,
            'graduation' => $this->graduation,
            'skills' => $this->skills,
            'experience' => $this->experience,
            'language' => $this->language,
            'resume' => $resumePath,
            'portfolio' => $this->portfolio,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
        ]);

        if ($this->create_account) {
            $password
                = $this->generateRandomPassword(16);
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'role_id' => 5,
                'password' => Hash::make($password),
            ]);
            $applicant->user_id = $user->id;
            $applicant->save();
            $user->notify(new NewUserPassword($password));
        }
        session()->flash('message', 'Application submitted successfully.');
        return $this->redirect(url()->previous(), navigate: true);
    }

    function generateRandomPassword($length = 12)
    {

        return \Illuminate\Support\Str::random($length);
    }

    public function mount($training)
    {
        $this->item = $training;
    }

    public function render()
    {
        return view('livewire.pages.website.apply-trainings.apply-training');
    }
}
