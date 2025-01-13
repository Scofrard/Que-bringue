<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPasswordForm extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|string|email|max:255',
    ];

    protected $messages = [
        'email.required' => 'Le champ email est obligatoire.',
        'email.email' => 'Le champ email doit être une adresse email valide.',
    ];

    public function submit()
    {
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('message', 'Le lien pour réinitialiser votre mot de passe à été envoyé');
        } else {
            $this->addError('email', __('Aucun utilisateur trouvé avec cette adresse email.'));
        }
    }

    public function render()
    {
        return view('livewire.forgot-password-form');
    }
}
