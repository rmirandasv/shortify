<?php

namespace App\Livewire\Components\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $email;
    public bool $sent = false;

    public function submit()
    {
        $validated = $this->validate([
            'email' => 'required|email',
        ]);

        Password::sendResetLink($validated);

        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.components.auth.forgot-password');
    }
}
