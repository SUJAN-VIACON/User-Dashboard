<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Email Address -->
        <div class="">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- name fields --}}

        <div class="flex justify-between items-center mt-4">
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    :value="old('first_name')" required autofocus />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    :value="old('last_name')" required autofocus />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        {{-- Gender fields --}}

        <div class="flex items-center w-full gap-4 my-5">
            <div class="">
                <div class="flex items-center gap-3">
                    <x-text-input id="gender-male" type="radio" name="gender" :value="old('gender')" required
                        autofocus />
                    <x-input-label for="gender-male" value="Male" />
                </div>

                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <div class="">
                <div class="flex items-center gap-3">
                    <x-text-input id="gender-female" type="radio" name="gender" :value="old('gender')" required
                        autofocus />
                    <x-input-label for="gender-female" value="Female" />
                </div>

                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>
        </div>

        {{-- country --}}
        <div class="mt-4">
            <x-input-label for="country" :value="__('Select Your Country')" />
            <x-selector-input :data="App\Models\Country::all()
                ->pluck('name', 'id')
                ->toArray()" name="country_id" id="country_id" />
            <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
        </div>

        <div class="mt-5">
            <div class="flex items-center gap-3">
                <x-text-input id="term_and_condition" class="rounded-[0]" type="checkbox" name="term_and_condition" required autofocus />
                <x-input-label for="term_and_condition" value="I agree with terms and conditions" />
            </div>
            <x-input-error :messages="$errors->get('term_and_condition')" class="mt-2" />
        </div>

        <div class="mt-4">
            <div class="flex items-center gap-3">
                <x-text-input id="allow_newsletter" class="rounded-[0]" type="checkbox" name="allow_newsletter" autofocus />
                <x-input-label for="allow_newsletter" value="I want to receive the newsletter" />
            </div>
            <x-input-error :messages="$errors->get('allow_newsletter')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
