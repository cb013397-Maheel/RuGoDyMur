<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-slot name="slot">

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="bg-black text-yellow-500 p-6 rounded-lg shadow-lg">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" class="text-yellow-500" />
                    <x-input id="name" class="block mt-1 w-full bg-black text-yellow-500 border-yellow-500 focus:ring-yellow-500 focus:border-yellow-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" class="text-yellow-500" />
                    <x-input id="email" class="block mt-1 w-full bg-black text-yellow-500 border-yellow-500 focus:ring-yellow-500 focus:border-yellow-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-yellow-500" />
                    <x-input id="password" class="block mt-1 w-full bg-black text-yellow-500 border-yellow-500 focus:ring-yellow-500 focus:border-yellow-500" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-yellow-500" />
                    <x-input id="password_confirmation" class="block mt-1 w-full bg-black text-yellow-500 border-yellow-500 focus:ring-yellow-500 focus:border-yellow-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms" class="text-yellow-500">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" class="text-yellow-500 border-yellow-500 focus:ring-yellow-500 focus:border-yellow-500" required />

                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-yellow-500 hover:text-yellow-400">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-yellow-500 hover:text-yellow-400">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-yellow-500 hover:text-yellow-400" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ms-4 bg-yellow-500 text-black hover:bg-yellow-400">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </x-slot>
    </x-authentication-card>
</x-guest-layout>
