<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold">Opdracht van {{$teacherassignment->student->name}} beoordelen:</h1>
    <h1 class="text-2xl font-bold mb-8">{{$teacherassignment->assignment->title}}</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    <x-input-label class="font-bold">Student antwoord</x-input-label>
    <p>{{ $teacherassignment->student_answer }}</p>

    <form method="POST"  action="{{ route('teacherassignments.update', ['userassignment' => $teacherassignment]) }}">
        @csrf
        @method('PUT')

        <div>
            <x-input-label>Beoordeling</x-input-label>

            {{-- een dropdown met alle progressies --}}
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