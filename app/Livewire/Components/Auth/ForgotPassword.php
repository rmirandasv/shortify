<?php

namespace App\Livewire\Components\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $email;

    public function submit()
    {
        $validated = $this->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink($validated);

        return $status === Password::RESET_LINK_SENT
            ? $this->dispatch('success', 'Reset link sent to your email.')
            : $this->dispatch('error', 'Unable to send reset link.');
    }

    public function render()
    {
        return view('livewire.components.auth.forgot-password');
    }
}
