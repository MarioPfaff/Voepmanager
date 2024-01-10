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

    <!-- Add more details as needed -->

</x-app-layout>
