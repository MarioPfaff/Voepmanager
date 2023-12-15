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

    <h1 class="text-2xl font-bold">Opdrachten</h1>

    <x-primary-button class="my-6">
        <a href="{{ route('assignments.create') }}">Nieuwe opdracht</a>
    </x-primary-button>

    <table class="table-auto w-full text-left">
        <tr>
            <th class="w-24">Opdracht</th>
            <th class="w-5">Gepubliceerd</th>
            <th class="w-5">Status</th>
            <th class="w-2"></th>
        </tr>

        <tbody>
            @foreach($assignments as $assignment) 
                <tr class="">
                    <td class="w-30"><b><p>{{ $assignment->title }}</p></b></td>
                    <td class="w-5"><p>
                    @if ($assignment->authors)
                        <p>{{ $assignment->created_at }} | {{ $assignment->authors->name }}</p>
                    @else
                        <p>{{ $assignment->created_at }}</p>
                    @endif                    
                    </p></td>

                    <td class="w-5"><p>{{ $assignment->status }}</p></td>
                    <td class="w-5"><a href="{{ route('assignments.show', ['assignment' => $assignment]) }}"><p>Bekijken</p></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br/>

    {{ $assignments -> links() }}
</x-app-layout>