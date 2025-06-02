<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-slot name="slot">
            <x-validation-errors class="mb-4" />

            @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
            @endsession

            <form method="POST" action="{{ url('/login') }}" class="bg-black text-yellow-500 p-6 rounded-lg shadow-lg">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-yellow-500" />
                    <x-input id="email" class="block mt-1 w-full bg-black text-yellow-500 border-yellow-500 focus:ring-yellow-500 focus:border-yellow-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-yellow-500" />
                    <x-input id="password" class="block mt-1 w-full bg-black text-yellow-500 border-yellow-500 focus:ring-yellow-500 focus:border-yellow-500" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center text-yellow-500">
                        <x-checkbox id="remember_me" name="remember" class="text-yellow-500 border-yellow-500 focus:ring-yellow-500 focus:border-yellow-500" />
                        <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-yellow-500 hover:text-yellow-400" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="ms-4 bg-yellow-500 text-black hover:bg-yellow-400">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </x-slot>


    </x-authentication-card>
</x-guest-layout>
