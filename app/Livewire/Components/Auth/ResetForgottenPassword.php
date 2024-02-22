<?php

namespace App\Livewire\Components\Auth;

use App\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ResetForgottenPassword extends Component
{
    public $token;
    public $email;
    public $password;
    public $password_confirmation;
    public $passwordReseted = false;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function submit()
    {
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(array_merge($validated, ['token' => $this->token]), function ($user, $password) {
            $user->forceFill([
                'password' => bcrypt($password)
            ])->save();

            event(new PasswordReset($user));
        });

        if ($status == Password::PASSWORD_RESET) {
            $this->passwordReseted = true;
        } else {
            $this->addError('email', __($status));
        }

    }

    public function render()
    {
        return view('livewire.components.auth.reset-forgotten-password');
    }
}
