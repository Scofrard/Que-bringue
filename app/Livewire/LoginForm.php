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

        //Authentifier l'utlisateur
        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate(); //Regénère l'ID de session pour éviter les attaques de fixation de session.
            //session()->flash('success', 'Connexion réussie !');
            return $this->redirect('/', navigate: true);
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
