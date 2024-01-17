<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold">Opdracht toewijzen:</h1><h1 class="text-2xl font-bold mb-8">{{$assignments->title}}</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    <form method="post" action="{{route('userassignments.store')}}">
        @csrf
        @method('POST')

        <div>
            <x-input-label>Student</x-input-label>

            <select name="student_id">
                @foreach($students as $student)
                    <option value="{{$student->id}}">
                            {{$student->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <x-input-label>Fase</x-input-label>
        
            <select id="phase" name="phase">
                @foreach($possiblePhases as $phase)
                    <option value="{{ $phase }}">
                        {{ $phase }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div>
            <x-input-label>Progressie</x-input-label>
        
            <select id="progress" name="progress">
                @foreach($possibleProgresses as $progress)
                    <option value="{{ $progress }}">
                        {{ $progress }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <x-text-input type="hidden" name="assignment_id" value="{{ $assignments->id }}"></x-text-input>
        </div>

        <div>
            <x-text-input type="hidden" name="docent_id" value="{{ Auth::user()->id }}"></x-text-input>
        </div>

            <x-primary-button class="my-6" type="submit"> Toewijzen </x-primary-button>
        </div>
    </form>

</x-app-layout>