<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold mb-8">Werkproces aanpassen: {{$workprocess->workprocess_title}}</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    <form method="POST"  action="{{ route('workprocesses.update', ['workprocess' => $workprocess]) }}">
        @csrf
        @method('PUT')

        <div>
            <x-input-label>Crebo</x-input-label>
            <x-text-input type="text" name="crebo" value="{{$workprocess->crebo}}"></x-text-input>
        </div>
        <div>
            <x-input-label>Kerntaak</x-input-label>
            <x-text-input type="text" name="core_task" value="{{$workprocess->core_task}}"></x-text-input>
        </div>
        <div>
            <x-input-label>Werkproces</x-input-label>
            <x-text-input type="text" name="workprocess_number" value="{{$workprocess->workprocess_number}}"></x-text-input>
        </div>
        <div>
            <x-input-label>Titel</x-input-label>
            <x-text-input type="text" name="workprocess_title" value="{{$workprocess->workprocess_title}}"></x-text-input>
        </div>

            <x-primary-button type="submit">Opslaan</x-primary-button>
        </div>
    </form>

</x-app-layout>