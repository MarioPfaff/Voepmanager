<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold mb-8">Kerntaak aanpassen: {{$core_task->name}}</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    <form method="POST"  action="{{ route('core_tasks.update', ['core_task' => $core_task]) }}">
        @csrf
        @method('PUT')

        <div>
            <x-input-label>Naam</x-input-label>
            <x-text-input type="text" name="name" value="{{$core_task->name}}"></x-text-input>
        </div>

            <x-primary-button class="my-6" type="submit"> Toepassen </x-primary-button>
        </div>
    </form>

</x-app-layout>