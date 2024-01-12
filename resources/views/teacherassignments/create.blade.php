<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold mb-8">Opdracht toewijzen</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    <form method="post" action="{{route('userassignments.store', ['assignment' => $assignments])}}">
        @csrf
        @method('POST')

        <div>
            <x-input-label>Student</x-input-label>

            <select name="student_id">
                @foreach($students as $student)
                    <option value="{{$student->id}}">
                            {{$student->id}} {{$student->name}}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- <div>
            <select name="assignment_id">
                @foreach($assignments as $assignment)
                    <option value="{{$assignment->id}}" 
                        Makes a check on the current user role to select it for this field.
                             Adds attribute 'selected' if true.
                        @if ($assignment->id === true) 
                            selected
                        @endif
                        >
                            {{$assignment->id}} {{$assignment->title}}</option>
                @endforeach
            </select>
        </div> --}}

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