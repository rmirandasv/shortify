<div class="flex flex-col items-center">
    <form wire:submit="resend" class="flex flex-col space-y-4 mb-4">
        @csrf
        <label for="email" class="sr-only">Email</label>
        <div class="flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
            <span class="text-slate-700">{{ auth()->user()->email }}</span>
        </div>
        <button type="submit"
            class="px-4 py-2 border border-transparent text-center leading-6 font-medium rounded-md text-white bg-slate-900 hover:bg-slate-800 focus:outline-none focus:border-slate-900 focus:shadow-outline-slate active:bg-slate-900 transition ease-in-out duration-150 whitespace-nowrap diasabled:opacity-50 disabled:cursor-not-allowed">
            Resend Verification Email
        </button>
    </form>
    @if ($resent)
        <div class="text-slate-700">
            <p class="text-green-500">A fresh verification link has been sent to your email address.</p>
        </div>
    @endif
</div>
