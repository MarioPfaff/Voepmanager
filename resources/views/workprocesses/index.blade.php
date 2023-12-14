<x-app-layout>
    
    <style>
        tbody tr:nth-of-type(even) {
            background-color: #f1f1f1;
        }

        table tr td, table tr th {
            padding: 5px 12px;
        }
        
        table tr td:nth-of-type(4n+1) {
            border-radius: 5px 0px 0px 5px;
        }

        table tr td:nth-of-type(1n+5) {
            border-radius: 0px 5px 5px 0px;
        }
    </style>

    @if (session('error'))
    <x-notification-danger>
        {{ session('error') }}
    </x-notification-danger>
    @endif

    @if (session('success'))
    <x-notification-success>
        {{ session('success') }}
    </x-notification-success>
    @endif

    <h1 class="text-2xl font-bold">Werkprocessen</h1>

    <table class="table-auto w-full text-left">
        <tr>
            <th class="w-10">Crebo</th>
            <th class="w-24">Kerntaak</th>
            <th class="w-5">Werkprocessen</th>
            <th class="w-24">Titel</th>
            <th class="w-5"></th>
            <th class="w-5"></th>
        </tr>

        <tbody>
            @foreach($workprocesses as $workprocess) 
                <tr class="">
                    <td class="w-10"><p>{{ $workprocess->crebo }}</p></td>
                    <td class="w-15"><p>{{ $workprocess->coreTask['name']}}</p></td>
                    <td class="w-5"><p>{{ $workprocess->workprocess_number }}</p></td>
                    <td class="w-30"><b><p>{{ $workprocess->workprocess_title }}</p></b></td>
                    <td class="w-5"><a href="{{ route('workprocesses.edit', ['workprocess' => $workprocess]) }}"><p>Aanpassen</p></a></td>
                    <td class="w-5"><p><a href="workprocesses/destroy/{{ $workprocess->id }}">Verwijderen</p></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-app-layout>