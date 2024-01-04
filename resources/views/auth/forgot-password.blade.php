<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Uw wachtwoord vergeten? Geen probleem. Laat ons uw email adres weten. Dan sturen wij u een email met een wachtwoord reset link dat u de mogelijkheid geeft uw wachtwoord te veranderen.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email wachtwoord reset link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
