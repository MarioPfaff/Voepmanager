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

    <div>
        <br/>
    <label><b>Geef je antwoord</b></label>

    <form method="POST"  action="{{ route('userassignment.update', ['userassignment' => $userassignment]) }}">
        @csrf
        @method('PUT')

        <div>
            <input id="description" value="{{ $userassignment->student_answer }}" type="hidden" name="description">
            <trix-editor class="trix-editor" input="student_answer"></trix-editor>
        </div>
        <div>
            <x-primary-button class="my-6" type="submit"> Lever antwoord in </x-primary-button>
        </div>
    </div>
    </form>


</x-app-layout>
