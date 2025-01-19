<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LogoutForm extends Component
{

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        session()->flash('message', 'Déconnecté');
        return;
    }

    public function render()
    {
        return view('livewire.logout-form');
    }
}
