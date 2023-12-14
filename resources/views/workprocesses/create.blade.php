<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold mb-8">Werkprocess creëren</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    <form method="post" action="{{route('workprocesses.store')}}">
        @csrf
        @method('POST')

        <div>
            <x-input-label>Crebo nummer</x-input-label>
            <x-text-input type="number" name="crebo" placeholder="25604" onkeypress="if(this.value.length==10) return false;"></x-text-input>
        </div>
        <div>
            <x-input-label>Kerntaak</x-input-label>

            <select name="core_task_id">
                @foreach($core_tasks as $core_task)
                    <option value="{{$core_task->id}}">
                            {{$core_task->id}}: {{$core_task->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label>Werkprocess</x-input-label>
            <x-text-input maxlength="10" type="text" name="workprocess_number" placeholder="B1-K1-W1"></x-text-input>
        </div>
        <div>
            <x-input-label>Titel</x-input-label>
            <x-text-input type="text" name="workprocess_title" placeholder="Plant werkzaamheden"></x-text-input>
        </div>

            <x-primary-button type="submit"> Creëren </x-primary-button>
        </div>
    </form>

</x-app-layout>