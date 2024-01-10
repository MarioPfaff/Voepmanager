<x-app-layout>    

    @if (session('error'))
        <div class="alert-success">
            <x-notification-danger>
                {{ session('error') }}
            </x-notification-danger>
        </div>
    @endif

    @if (session('success'))
        <div class="alert-success">
            <x-notification-success>
                {{ session('success') }}
            </x-notification-success>
        </div>
    @endif
    
    <h1 class="text-2xl font-bold">Werkprocessen</h1>

    <x-primary-button class="my-6">
        <a href="{{ route('workprocesses.create') }}">Werkproces creëren</a>
    </x-primary-button>

    <select id="filterDropdown" name="core_task_id">
        <option value=""> Alle </option>
        @foreach($core_tasks as $core_task)
            <option value="{{$core_task->name}}">
                {{$core_task->name}}
            </option>
        @endforeach
    </select>

    <table id="workprocessTable" class="table-auto w-full text-left">
        <tr>
            <th class="w-5"></th>
            <th class="w-5"></th>
            <th class="w-10">Crebonummer</th>
            <th class="w-24">Kerntaak</th>
            <th class="w-5">Werkproces</th>
            <th class="w-24">Titel</th>
            <th class="w-5"></th>
        </tr>

        <tbody>
            @foreach($workprocesses as $workprocess) 
                <tr class="">
                    <td class="w-5"><a href="{{ route('workprocesses.edit', ['workprocess' => $workprocess]) }}"><p><img src="{{ asset('images/edit.svg')}}" alt="Bewerken"></p></a></td>
                    <td class="w-5"><a href="werkprocessen/destroy/{{ $workprocess->id }}"><p><img src="{{ asset('images/delete.svg')}}" alt="Verwijderen"></p></a></td>
                    <td class="w-10"><p>{{ $workprocess->crebo }}</p></td>
                    <td class="w-15"><p>{{ $workprocess->coreTask['name']}}</p></td>
                    <td class="w-5"><p>{{ $workprocess->workprocess_number }}</p></td>
                    <td class="w-30"><b><a href="{{ route('workprocesses.view', ['workprocess' => $workprocess]) }}"><p>{{ $workprocess->workprocess_title }}</p></a></b></td>
                    <td class="w-30"><b><a href="{{ route('workprocesses.view', ['workprocess' => $workprocess]) }}"><p><img src="{{ asset('images/forward.svg')}}" alt="Bekijken"></p></a></b></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</x-app-layout>