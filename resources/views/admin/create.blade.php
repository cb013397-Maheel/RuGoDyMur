<x-app-layout>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('user.store') }}" class="bg-white text-gray-800 p-6 rounded-lg shadow-lg">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" class="text-gray-800" />
                    <x-input id="name" class="block mt-1 w-full bg-gray-100 text-gray-800 border-gray-300 focus:ring-gray-500 focus:border-gray-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" class="text-gray-800" />
                    <x-input id="email" class="block mt-1 w-full bg-gray-100 text-gray-800 border-gray-300 focus:ring-gray-500 focus:border-gray-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" class="text-gray-800" />
                    <x-input id="password" class="block mt-1 w-full bg-gray-100 text-gray-800 border-gray-300 focus:ring-gray-500 focus:border-gray-500" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-gray-800" />
                    <x-input id="password_confirmation" class="block mt-1 w-full bg-gray-100 text-gray-800 border-gray-300 focus:ring-gray-500 focus:border-gray-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                <div class="flex items-center justify-end mt-4">

                    <x-button class="ms-4 bg-gray-800 text-white hover:bg-gray-700">
                        {{ __('Create User') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
