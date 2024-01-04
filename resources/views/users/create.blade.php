<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold mb-8">Gebruiker creëren</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    <form method="post" action="{{route('users.store')}}">
        @csrf
        @method('POST')

        <div>
            <x-input-label>Naam</x-input-label>
            <input type="text" name="name"  placeholder="Jouw naam ..."/>
        </div>
        <div>
            <x-input-label>Email</x-input-label>
            <input type="text" name="email"  placeholder="Jouw email ..."/>
        </div>
        <div> 
            <x-input-label>Wachtwoord</x-input-label>
            <input type="text" name="password"  placeholder="Jouw wachtwoord ..."/>
        </div>

            <x-primary-button class="my-6" type="submit"> creëren </x-primary-button>
        </div>
    </form>

</x-app-layout>