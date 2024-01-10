<x-app-layout>    

    @if (session('error'))
        {{-- <div class="alert-success"> --}}
            <x-notification-danger>
                {{ session('error') }}
            </x-notification-danger>
        {{-- </div> --}}
    @endif

    @if (session('success'))
        <div class="alert-success">
            <x-notification-success>
                {{ session('success') }}
            </x-notification-success>
        </div>
    @endif
    
    <h1 class="text-2xl font-bold">Kerntaken</h1>

    <x-primary-button class="my-6">
        <a href="{{ route('core_tasks.create') }}">Kerntaak creëren</a>
    </x-primary-button>

    <table class="table-auto w-full text-left">
        <tr>
            <th class="w-5"></th>
            <th class="w-5"></th>
            <th class="w-10">Id</th>
            <th class="w-10">Naam</th>
        </tr>

        <tbody>
            @foreach($core_tasks as $coretask) 
                <tr class="">
                    <td class="w-5"><a href="{{ route('core_tasks.edit', ['core_task' => $coretask]) }}"><p><img src="{{ asset('images/edit.svg')}}" alt="Bewerken"></p></a></td>
                    <td class="w-5"><p><a href="kerntaken/destroy/{{ $coretask->id }}"><img src="{{ asset('images/delete.svg')}}" alt="Verwijderen"></p></a></td>
                    <td class="w-10"><p>{{ $coretask->id }}</p></td>
                    <td class="w-15"><p>{{ $coretask->name }}</p></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</x-app-layout>