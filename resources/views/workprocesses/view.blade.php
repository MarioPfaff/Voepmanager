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

    <h1 class="text-2xl font-bold">{{ $workprocesses->workprocess_number }} - {{ $workprocesses->workprocess_title }}</h1>


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
                    @if ($assignment->author)
                        <p>{{ $assignment->created_at }} | {{ $assignment->author->name }}</p>
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
</x-app-layout>