<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold mb-8">Opdracht toewijzen</h1>

    @if($errors->any())
        <x-notification-danger>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-notification-danger>
    @endif

    <form method="post" action="{{ route('userassignments.store') }}">
        @csrf
        @method('POST')

        <div>
            <div class="mb-2 font-bold"><label for="student">student</label></div>
            <div class="mb-6"><input type="text" name="student" id="student" placeholder="student"/></div>
        </div>

        <div>
            <div class="mb-2 font-bold"><label for="assignment">opdracht</label></div>
            <div class="mb-6"><input type="text" name="assignment" id="assignment" placeholder="opdracht"/></div>
        </div>

        {{-- <div>
            <input id="description" value="" type="hidden" name="description">
            <trix-editor class="trix-editor" input="description"></trix-editor>
        </div>

        <div> 
            <div class="mb-2 font-bold"><label for="deadline">Deadline</label></div>
            <div class="mb-6"><input type="date" name="deadline" id="deadline" placeholder="Deadline"/></div>
        </div> --}}

        <div>
            <div class="mb-2 font-bold"><label for="students">Student</label></div>
            <div class="mb-6">
                {{-- <select name="student_id">
                    @foreach($students as $student)
                        <option value="{{$student->id}}">
                                {{$student->id}}: {{$student->name}}
                        </option>
                    @endforeach
                </select> --}}
            </div>
        </div>

        <div>
            <input type="hidden" name="docent_id" value="{{ Auth::user()->id }}">
        </div>

        <div>
            <x-primary-button type="submit"> Toewijzen </x-primary-button>
        </div>
    </form>

</x-app-layout>
