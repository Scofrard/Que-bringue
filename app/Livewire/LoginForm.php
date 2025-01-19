<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;
    public $remember = false;
    public $redirect = false;

    protected $messages = [
        'email.required' => 'Le champ email est obligatoire.',
        'email.email' => 'Veuillez entrer une adresse email valide.',
        'password.required' => 'Le champ mot de passe est obligatoire.',
    ];

    public function login()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();
            session()->flash('success', 'Connexion réussie !');
            $this->redirect = true;
            return;
        }

        throw ValidationException::withMessages([
            'email' => __('Adresse email ou mot de passe incorrect'),
        ]);
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
