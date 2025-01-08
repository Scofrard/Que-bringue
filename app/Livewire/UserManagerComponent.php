<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserManagerComponent extends Component
{
    public $name, $email, $password, $selectedUserId;
    public $isEditMode = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ];

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->isEditMode = false;
        $this->selectedUserId = null;
    }

    public function createUser()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        session()->flash('success', 'Utilisateur créé avec succès.');
        $this->resetForm();
    }

    public function editUser($userId)
    {
        $user = User::findOrFail($userId);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->isEditMode = true;
        $this->selectedUserId = $userId;
    }

    public function updateUser()
    {
        $user = User::findOrFail($this->selectedUserId);
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$this->selectedUserId}",
        ]);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Utilisateur mis à jour.');
        $this->resetForm();
    }

    public function deleteUser($userId)
    {
        User::findOrFail($userId)->delete();
        session()->flash('success', 'Utilisateur supprimé.');
    }

    public function render()
    {
        return view('livewire.user-manager-component', [
            'users' => User::all(),
        ]);
    }
}
