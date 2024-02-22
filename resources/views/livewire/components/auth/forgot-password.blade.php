<div class="w-full p-4 flex flex-col bg-white rounded-md shadow">
    @if (!$sent)
        <p class="text-2xl font-bold text-gray-800 text-center">
            ¿Forgot your password?
        </p>
        <p class="text-gray-600 mb-8 text-xs text-center">
            Enter your email and we will send you a link to reset your password.
        </p>
        <form class="flex flex-col space-y-4" wire:submit="submit">
            <div class="flex flex-col space-y-1">
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" wire:model="email"
                    class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
                @error('email')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col space-y-4">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gradient-to-br from-indigo-600 via-indigo-700 to-indigo-800 hover:from-indigo-700 hover:via-indigo-800 hover:to-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed"
                    wire:loading.attr="disabled">
                    Send Email
                </button>
                <a href="{{ route('login') }}" class="text-center text-sm text-indigo-600 hover:text-indigo-700">Back to
                    login</a>
            </div>
        </form>
    @endif
    @if ($sent)
        <div class="flex flex-col space-y-4">
            <p class="text-sm text-green-700 text-center">
                We have sent you an email with a link to reset your password.
            </p>
            <a wire:navigate href="{{ route('login') }}" class="text-center text-sm text-indigo-600 hover:text-indigo-700">Back to login</a>
        </div>
    @endif
</div>
