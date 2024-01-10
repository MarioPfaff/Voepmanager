<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Bedankt voor het aanmelden! Kunt u, voordat u aan de slag gaat, uw email adres verifiëren door op de link te klikken die we zojuist naar u hebben gemaild? Als u de email niet heeft ontvangen, sturen wij u graag een nieuwe.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Er is een nieuwe verificatielink verzonden naar het email adres dat u tijdens de registratie heeft opgegeven.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Verstuur verificatie email opnieuw') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Uitloggen') }}
            </button>
        </form>
    </div>
</x-guest-layout>
