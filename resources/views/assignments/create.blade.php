<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold mb-8">Maak een opdracht</h1>

    @if($errors->any())
        <x-notification-danger>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-notification-danger>
    @endif

    <form method="post" action="{{ route('assignments.store') }}">
        @csrf
        @method('POST')

        <div>
            <div class="mb-2 font-bold"><label for="title">Titel</label></div>
            <div class="mb-6"><input type="text" name="title" id="title" placeholder="Titel"/></div>
        </div>
        <div>
            <div class="mb-2 font-bold"><label for="description">Omschrijving</label></div>
            <div class="mb-6"><input type="textarea" name="description" id="description" placeholder="Omschrijving"/></div>
        </div>
        <div> 
            <div class="mb-2 font-bold"><label for="deadline">Deadline</label></div>
            <div class="mb-6"><input type="date" name="deadline" id="deadline" placeholder="Deadline"/></div>
        </div>
        <br/>
        <div>
            <button type="submit">Creëer je opdracht</button>
        </div>
    </form>

</x-app-layout>
