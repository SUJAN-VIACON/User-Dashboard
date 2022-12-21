<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('User Information') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('users.update', $user->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Email Address -->
        <div class="">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                value="{{ $user->email }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- name fields --}}

        <div class="flex justify-between items-center mt-4 gap-5">
            <div class="w-full">
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    value="{{ $user->first_name }}" required autofocus />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div class="w-full">
                <x-input-label for="last_name" :value="__('Last Name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    value="{{ $user->last_name }}" required autofocus />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        {{-- Gender fields --}}

        <div class="flex items-center w-full gap-4 my-5">
            <div class="">
                <div class="flex items-center gap-3">
                    @php
                        $isChecked = $user->gender == 'male';
                    @endphp
                    <x-text-input id="gender-male" type="radio" :checked="$isChecked" :value="$use->gender" name="gender"
                        value="male" required autofocus />
                    <x-input-label for="gender-male" value="male" />
                </div>

                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <div class="">
                <div class="flex items-center gap-3">
                    @php
                        $isChecked = $user->gender == 'female';
                    @endphp
                    <x-text-input :value="$use->gender" :checked="$isChecked" id="gender-female" type="radio" name="gender"
                        value="female" required autofocus />
                    <x-input-label for="gender-female" value="female" />
                </div>

                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>
        </div>

        {{-- country --}}
        <div class="mt-4">
            <x-input-label for="country" :value="__('Select Your Country')" />
            <x-selector-input :data="App\Models\Country::all()
                ->pluck('name', 'id')
                ->toArray()" name="country_id" id="country_id" :value="$user->country_id" />
            <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
