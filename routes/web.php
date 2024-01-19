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

use Illuminate\Support\Facades\Route;

Route::domain(config('app.shortlink_domain'))->group(function () {
    Route::get('/{code}', \App\Http\Controllers\ShortLinkController::class)
        ->name('shortlink.redirect');
});

Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');
