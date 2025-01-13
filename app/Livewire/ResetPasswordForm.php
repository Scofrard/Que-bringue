<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ResetPasswordForm extends Component
{
    public $email;
    public $token;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8|regex:/[A-Z]/|confirmed',
    ];

    protected $messages = [
        'email.required' => 'Le champ email est obligatoire.',
        'email.email' => 'Le champ email doit être une adresse valide.',
        'password.required' => 'Le champ mot de passe est obligatoire.',
        'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        'password.regex' => 'Le mot de passe doit contenir au moins une majuscule.',
        'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
    ];

    public function mount($token, $email)
    {
        // Initialiser le token et l'email dans le composant
        $this->token = $token;
        $this->email = $email;
    }

    public function submit()
    {
        $this->validate();

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            session()->flash('message', 'Votre mot de passe a été réinitialisé avec succès.');
            return redirect()->route('login');
        } else {
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.reset-password-form');
    }
}
