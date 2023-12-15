<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold mb-8">Werkproces aanpassen: {{$workprocess->workprocess_title}}</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    <form method="POST"  action="{{ route('workprocesses.update', ['workprocess' => $workprocess]) }}">
        @csrf
        @method('PUT')

        <div>
            <x-input-label>Crebo nummer</x-input-label>
            <x-text-input type="number" name="crebo" value="{{$workprocess->crebo}}" onkeypress="if(this.value.length==10) return false;"></x-text-input>
        </div>
        <div>
            <x-input-label>Kerntaak</x-input-label>

            <select name="core_task_id">
                @foreach($core_tasks as $core_task)
                    <option value="{{$core_task->id}}" 
                        {{-- Makes a check on the current user role to select it for this field.
                             Adds attribute 'selected' if true. --}}
                        @if ($core_task->id === $workprocess->core_task_id) 
                            selected
                        @endif
                        >
                            {{$core_task->id}}: {{$core_task->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label>Werkprocess</x-input-label>
            <x-text-input maxlength="10" type="text" name="workprocess_number" value="{{$workprocess->workprocess_number}}"></x-text-input>
        </div>
        <div>
            <x-input-label>Titel</x-input-label>
            <x-input-label>Titel</x-input-label>
            <x-text-input type="text" name="workprocess_title" value="{{$workprocess->workprocess_title}}"></x-text-input>
        </div>

            <x-primary-button type="submit"> Toepassen </x-primary-button>
        </div>
    </form>

</x-app-layout>