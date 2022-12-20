<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete User') }}
        </h2>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete User') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('users.destroy',$user->id) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg text-center font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete the user?') }}
            </h2>

            <div class="mt-6 flex justify-center">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete User') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
