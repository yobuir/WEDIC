<?php

namespace App\Livewire\Pages\Dashboard\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditLivewire extends Component
{


    public $name, $email, $error, $role_id, $user;
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

    public function store()
    {
        try {
            $user = $this->user?->update([
                'name' => $this->name,
                'email' =>  $this->email,
                'role_id' => $this->role_id,
            ]);

            return redirect()->route('dashboard.users.');
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function disAbleItem()
    {

        try {
            $this->user?->update(['active' => 0]);
            return redirect()->route('dashboard.users.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }
    public function DeleteItem()
    {
        try {
            $this->user?->delete();
            return redirect()->route('dashboard.users.');
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return $this->redirect(url()->previous(), navigate: true);
        }
    }

    public function mount($id)
    {
        $this->roles = Role::all();
        $this->user = User::findOrFail($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role_id = $this->user->role_id;
    }
    public function render()
    {
        return view('livewire.pages.dashboard.user.edit-livewire');
    }
}
