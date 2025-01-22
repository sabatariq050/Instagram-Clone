<x-guest-layout>
    <x-validation-errors class="mb-4" />

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>

            <div>
            <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" placeholder="Email or UserName" required autofocus autocomplete="username" />
            </div>

            <div class="mt-1">
               
                <div class="flex items-center">
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                    <span id="togglePassword" class="ml-2 text-sm text-blue-500 cursor-pointer hover:underline">
                        Show
                    </span>
                </div>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
               

            </div>
            <div class="flex items-center justify-center mt-4">
                Dont have account?
                <a class="underline  font-bold text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
            </div>
        </x-authentication-card>
    </form>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle the button text
            this.textContent = type === 'password' ? 'Show' : 'Hide';
        });
    </script>
</x-guest-layout>
