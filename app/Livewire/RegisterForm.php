<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name, $firstname, $phone, $email, $password, $password_confirmation;

    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'firstname' => 'required|string|min:3|max:255',
        'phone' => 'required|digits_between:8,15',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|regex:/[A-Z]/|confirmed',
    ];

    protected $messages = [
        'name.required' => 'Le champ nom est obligatoire.',
        'name.string' => 'Le champ nom doit être une chaîne de caractères.',
        'name.min' => 'Le champ nom doit contenir au moins 3 caractères.',
        'name.max' => 'Le champ nom ne peut pas dépasser 255 caractères.',

        'firstname.required' => 'Le champ prénom est obligatoire.',
        'firstname.string' => 'Le champ prénom doit être une chaîne de caractères.',
        'firstname.min' => 'Le champ prénom doit contenir au moins 3 caractères.',
        'firstname.max' => 'Le champ prénom ne peut pas dépasser 255 caractères.',

        'phone.required' => 'Le champ téléphone est obligatoire.',
        'phone.digits_between' => 'Le champ téléphone doit contenir entre 8 et 15 chiffres.',

        'email.required' => 'Le champ email est obligatoire.',
        'email.string' => 'Le champ email doit être une chaîne de caractères.',
        'email.email' => 'Le champ email doit être une adresse email valide.',
        'email.max' => 'Le champ email ne peut pas dépasser 255 caractères.',
        'email.unique' => 'Cet email est déjà utilisé.',

        'password.required' => 'Le champ mot de passe est obligatoire.',
        'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
        'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        'password.regex' => 'Le mot de passe doit contenir au moins une majuscule',
        'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
    ];

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'firstname' => $this->firstname,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        //session()->flash('message', 'Compte créé avec succès !');
        return $this->redirect('/login', navigate: true);
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
