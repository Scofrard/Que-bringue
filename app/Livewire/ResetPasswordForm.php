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

    // Validation des données
    protected $rules = [
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8|regex:/[A-Z]/|confirmed',
    ];

    // Messages d'erreur pour la validation
    protected $messages = [
        'email.required' => 'Le champ email est obligatoire.',
        'email.email' => 'Le champ email doit être une adresse valide.',
        'password.required' => 'Le champ mot de passe est obligatoire.',
        'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        'password.regex' => 'Le mot de passe doit contenir au moins une majuscule.',
        'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
    ];

    // Méthode qui sera appelée lors de la soumission du formulaire
    public function submit()
    {
        $this->validate();

        // Réinitialiser le mot de passe via la façade Password
        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user, $password) {
                // Mettre à jour le mot de passe de l'utilisateur
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        // Si la réinitialisation a réussi
        if ($status == Password::PASSWORD_RESET) {
            session()->flash('message', 'Votre mot de passe a été réinitialisé avec succès.');
            return redirect()->route('login');
        } else {
            // Si un problème survient, afficher l'erreur
            $this->addError('email', __($status));
        }
    }

    // La méthode render permet de rendre la vue associée à ce composant
    public function render()
    {
        return view('livewire.reset-password-form');
    }
}
