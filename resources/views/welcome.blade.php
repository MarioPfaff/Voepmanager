<x-guest-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden sm:rounded-lg">
              <div class="p-6 text-gray-900 text-center">
                  <x-primary-button>
                      <a href="{{ route('login') }}">Inloggen</a>
                  </x-primary-button>

                  <x-secondary-button>
                      <a href="{{ route('register') }}">Registreren</a>
                  </x-secondary-button>
              </div>
          </div>
      </div>
  </div>
</x-guest-layout>
