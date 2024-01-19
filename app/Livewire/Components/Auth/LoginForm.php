<?php

namespace App\Livewire\Components\Auth;

use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (!auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->addError('email', 'The provided credentials do not match our records.');
            return;
        }

        return $this->redirectRoute('dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.components.auth.login-form');
    }
}
