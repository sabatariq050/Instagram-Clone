<x-guest-layout>
    <x-validation-errors class="mb-4" />
    
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <form method="POST" action="{{ route('register') }}" class="w-full max-w-md p-6 bg-white shadow-lg rounded-md">
            @csrf

            <x-authentication-card>
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>

                <div class="text-center mb-4">
                    Sign up to see photos and videos from your friends.
                </div>

                <div class="mt-1">
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus autocomplete="username" />
                </div>

                <div class="mt-1">
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                </div>

                <div class="mt-1">
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                </div>

                <!-- New Username Input Field -->
                <div class="mt-1">
                    <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" placeholder="UserName" required autocomplete="username" />
                </div>

                <div class="mt-1">
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Full Name" required autocomplete="name" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-between mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ms-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </x-authentication-card>
        </form>
    </div>
</x-guest-layout>
