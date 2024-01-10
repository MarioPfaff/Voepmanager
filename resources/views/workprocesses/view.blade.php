<x-app-layout>

    <a href={{ route('workprocesses.index') }} class="flex mb-5 backBtn">
        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="18" class="mr-2">
            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/>
        </svg>
    
        Terug
    </a>
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
                    <td class="w-5"><a href="{{ route('assignments.show', ['assignment' => $assignment]) }}"><p><img src="{{ asset('images/forward.svg')}}" alt="Bekijken"></p></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br/>
</x-app-layout>