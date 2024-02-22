<?php

use function Laravel\Folio\name;

name('verification.notice');

?>

<x-layouts.user>
    <div class="flex flex-col px-4 lg:px-0">
        <div class="flex flex-col max-w-7xl mx-auto bg-white py-6 px-4 sm:px-6 lg:px-8 rounded shadow shadow-slate-900">
          <div class="flex flex-col items-center">
            <h1 class="text-3xl font-bold text-slate-900 mb-4">Verify your email address</h1>
            <div class="mt-4 flex flex-col items-center justify-center">
              <p class="text-slate-700 mb-8">Before proceeding, please check your email for a verification link. If you did not receive the email, click the button below to request another.</p>
            </div>
            <livewire:components.auth.resend-verification-email />
          </div>
        </div>
    </div>
</x-layouts.user>
