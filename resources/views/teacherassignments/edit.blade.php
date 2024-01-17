<x-app-layout>

    <x-back-button/>
    {{-- een titel met de students naam en opdracht titel --}}
    <h1 class="text-2xl font-bold">Opdracht van {{$teacherassignment->student->name}} beoordelen:</h1>
    <h1 class="text-2xl font-bold mb-8">{{$teacherassignment->assignment->title}}</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    {{-- het antwoord van de student. de opmaak van hoe je het antwoord aanvraagd is anders,
        omdat je zo de html weghaalt. als je een opdracht inleverd met trix, dan zet die het antwoord 
        in een div. zo krijg je die div niet. --}}
    <label>Student antwoord</label>
    <p>{!! $teacherassignment->student_answer !!}</p>

    {{-- hier defineer ik de route naar de update en de variabel die mee gaat.
        userassignment is de variabel gedefineerd in de update functie --}}
    <form method="POST"  action="{{ route('teacherassignments.update', ['userassignment' => $teacherassignment]) }}">
        @csrf
        @method('PUT')

        <div>
            <x-input-label>Beoordeling</x-input-label>

            {{-- een dropdown met de progressies die ik gedefineerd heb in de edit functie --}}
            <select name="progress">
                @foreach($progresses as $progress)
                    <option value="{{$progress}}">{{$progress}}</option>
                @endforeach
            </select>
        </div>
            <x-primary-button class="my-6" type="submit"> Beoordelen </x-primary-button>
        </div>
    </form>

</x-app-layout>