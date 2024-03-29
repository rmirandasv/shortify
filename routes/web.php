<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::domain(config('app.shortlink_domain'))->group(function () {
    Route::get('/{code}', \App\Http\Controllers\ShortLinkController::class)
        ->name('shortlink.redirect');
});

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('/auth/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::updateOrCreate(
        ['email' => $googleUser->email],
        [
            'name' => $googleUser->name,
            'google_id' => $googleUser->id,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]
    );

    if ($user->email_verified_at === null) {
        $user->email_verified_at = now();
        $user->save();
    }
 
    Auth::login($user);
 
    return redirect('/dashboard');
})->name('login.google.callback');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');
