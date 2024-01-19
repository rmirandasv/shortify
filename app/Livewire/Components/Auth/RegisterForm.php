<?php

namespace App\Livewire\Components\Auth;

use App\Actions\RegisterUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function register()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $registerUser = new RegisterUser();
        $user = $registerUser($this->name, $this->email, $this->password, $this->password_confirmation);

        if (!$user) {
            $this->addError('email', 'There was a problem creating your account.');
            return;
        }

        Auth::login($user);

        return $this->redirectRoute('dashboard', navigate: true);
    }

    public function render()
    {
        return view('livewire.components.auth.register-form');
    }
}
