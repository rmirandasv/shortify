<?php

namespace App\Livewire\Components\Auth;

use Livewire\Component;

class ResendVerificationEmail extends Component
{
    public bool $resent = false;

    public function resend()
    {
        auth()->user()->sendEmailVerificationNotification();

        $this->resent = true;
    }

    public function render()
    {
        return view('livewire.components.auth.resend-verification-email');
    }
}
