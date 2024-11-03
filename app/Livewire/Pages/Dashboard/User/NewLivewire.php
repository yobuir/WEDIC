<?php

namespace App\Livewire\Pages\Dashboard\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class NewLivewire extends Component
{
    public $name, $email, $password_confirmation, $password, $error, $role_id;
    public $openModel;
    public $roles;
    public function toggleModel()
    {
        $this->openModel = true;
    }



    public function updatedPasswordConfirmation()
    {
        if ($this->password != $this->password_confirmation) {
            $this->error = 'Password confirmation is incorrect';
        } else {
            $this->error = 'Password confirmation verified';
        }
    }
    public function closeModal()
    {
        $this->openModel = false;
    }

    public function store()
    {
        try {
            $user = User::create([
                'name' => $this->name,
                'email' =>  $this->email,
                'password' => Hash::make($this->password),
                'role_id' => $this->role_id,
            ]);

            return redirect()->route('dashboard.users.edit', array('id' => $user?->id));
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function mount()
    {
        $this->roles = Role::all();
    }
    public function render()
    {
        return view('livewire.pages.dashboard.user.new-livewire');
    }
}
