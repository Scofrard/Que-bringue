<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LogoutForm extends Component
{

    public function logout()
    {
        Auth::logout(); // Déconnecte l'utilisateur
        session()->invalidate(); // Supprime la session
        session()->regenerateToken(); // Regénère le token de session
        //session()->flash('message', 'Déconnecté');
        return $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.logout-form');
    }
}
