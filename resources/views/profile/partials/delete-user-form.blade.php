<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Account verwijderen') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Wanneer uw account is verwijderd, worden alle bronnen en informatie permanent verwijderd. Voordat u uw account verwijderd, download alstublieft alle informatie die u wilt behouden.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Account verwijderen') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Weet u zeker dat u uw account wilt verwijderen?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Wanneer uw account is verwijderd, worden alle bronnen en informatie permanent verwijderd. Voer alstublieft uw wachtwoord in, om te bevestigen dat u uw account permanent wilt verwijderen.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Wachtwoord') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Annuleren') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Account verwijderen') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
