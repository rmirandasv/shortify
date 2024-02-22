<x-mail::message>
# Your password has been reset

Hello {{ $user->name }}, your password has been reset. Please click the button below to login with your new password.

<x-mail::button :url="route('login')">
  Login
</x-mail::button>

If you did not request a password reset, please contact us immediately.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
