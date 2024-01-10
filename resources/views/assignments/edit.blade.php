<x-app-layout>

    <x-back-button/>
    <h1><span class="text-2xl font-bold mb-8">Je past een opdracht aan:</span> <br/> {{ $assignment->title }}</h1>
    <br/>
    @if($errors->any())
        <x-notification-danger>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-notification-danger>
    @endif

    <form method="post" action="{{ route('assignments.update', ['assignment' => $assignment]) }}">
        @csrf
        @method('PUT')

        <div>
            <div class="mb-2 font-bold"><label for="title">Titel</label></div>
            <div class="mb-6"><input type="text" name="title" id="title" placeholder="Titel" value="{{ $assignment->title }}"/></div>
        </div>
        
        <div>
            <input id="description" value="{{ $assignment->description }}" type="hidden" name="description">
            <trix-editor class="trix-editor" input="description"></trix-editor>
        </div>
        <div> 
            <div class="mb-2 font-bold"><label for="deadline">Deadline</label></div>
            <div class="mb-6"><input type="date" name="deadline" id="deadline" placeholder="Deadline" value="$assignment->deadline"/></div>
        </div>
        <div>
            <div class="mb-2 font-bold"><label for="workprocess">Werkproces koppelen</label></div>
            <div class="mb-6">
                <select name="workprocess_id">
                    @foreach($workprocesses as $workprocess)
                        <option value="{{ $workprocess->id }}" @if($assignment->workprocess_id == $workprocess->id) selected @endif>{{$workprocess->workprocess_title}}</option>
                    @endforeach
                </select> 
            </div>
        </div>

        <div>
            <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
        </div>

        <div>
            <button type="submit">Aanpassingen opslaan</button>
        </div>
    </form>

</x-app-layout>
