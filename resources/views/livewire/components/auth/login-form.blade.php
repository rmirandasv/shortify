<div class="w-full p-4 flex flex-col bg-white rounded-md shadow">
    <p class="text-2xl font-bold text-gray-800 text-center">Log In</p>
    <p class="text-gray-600 mb-8 text-xs">Log in to your account to save your links and get access to your dashboard.</p>
    <div clsss="flex flex-col">
        <div class="flex justify-center">
            <a href="{{ route('login.google') }}" class="px-4 py-2 flex items-center space-x-2 border border-gray-400 bg-white hover:bg-gray-300 text-gray-800 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                </svg>
                <span class="ml-2 text-gray-800 text-sm font-medium uppercase">Continue with Google</span>
            </a>
        </div>
    </div>
    <div class="my-4 relative">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-300"></div>
        </div>
        <div class="relative flex justify-center">
            <span class="bg-white px-2 text-sm text-gray-500">Or</span>
        </div>
    </div>
    <form class="flex flex-col space-y-4" wire:submit="login">
        <div class="flex flex-col space-y-1">
            <label for="email" class="text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" wire:model="email" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
            @error('email') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
        </div>
        <div class="flex flex-col space-y-1">
            <label for="password" class="text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" wire:model="password" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm">
            @error('password') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
        </div>
        <div class="flex flex-col space-y-1">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gradient-to-br from-indigo-600 via-indigo-700 to-indigo-800 hover:from-indigo-700 hover:via-indigo-800 hover:to-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed" wire:loading.attr="disabled">
                Log In
            </button>
        </div>
    </form>
    <div class="mt-4 flex flex-col space-y-1 items-center">
        <a wire:navigate href="{{ route('auth.forgot-password') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
            Forgot your password?
        </a>
        <a wire:navigate href="{{ route('register') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
            Don't have an account? Register
        </a>
    </div>
</div>
