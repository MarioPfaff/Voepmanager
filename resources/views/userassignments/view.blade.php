<x-app-layout>

    <x-back-button/>

    <h1 class="text-2xl font-bold mb-4">{{ $userassignment->assignment->title }}</h1>

    <div>
        <h3 class="font-bold mb-3 mt-6">Omschrijving</h3>
        <p>{!! html_entity_decode($userassignment->assignment->description) !!}</p>
    </div>

    <div>
        <h3 class="font-bold mb-3 mt-6">Deadline</h3>
        <p>{{ $userassignment->assignment->deadline ?: 'Er is geen deadline' }}</p>
    </div>

    <div>
        <h3 class="font-bold mb-3 mt-6">Fase</h3>
        <p>{{ $userassignment->phase }}</p>
    </div>

    Geef je antwoord:

    <form method="POST"  action="{{ route('userassignment.store', ['userassignment' => $userassignment]) }}">
        @csrf
        @method('POST')
        <div>
            <x-input-label>Antwoorden</x-input-label>
            <x-text-input type="textfield" name="student_answer" value="{{$userassignment->student_answer}}"></x-text-input>
        </div>
            <x-primary-button class="my-6" type="submit"> Antwoorden </x-primary-button>
        </div>
    </form>


</x-app-layout>
