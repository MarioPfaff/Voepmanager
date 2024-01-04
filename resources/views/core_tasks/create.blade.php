<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold mb-8">Kerntaak creëren</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    <form method="post" action="{{route('core_tasks.store')}}">
        @csrf
        @method('POST')

        <div>
            <x-input-label>Naam</x-input-label>
            <x-text-input type="text" name="name" placeholder="Realiseert software"></x-text-input>
        </div>

            <x-primary-button class="my-6" type="submit"> Creëren </x-primary-button>
        </div>
    </form>

</x-app-layout>