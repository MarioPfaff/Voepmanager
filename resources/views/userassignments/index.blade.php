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

    <h1 class="text-2xl font-bold">Opdrachten</h1>


    @if (Auth::user()->hasRole('Student'))
        <br/>

        {{-- Hier hebben we een lijst van waardes meegenomen uit de controller.
             Wordt voornamelijk gebruikt om de progressie aan te tonen. --}}
        <b>Progressie:</b><br/>
        <b>   - Goedgekeurd: </b>{{ $assignmentsApproved }} / {{ $assignmentsAssigned }} opdrachten goedgekeurd.
        Je hebt nog {{ $assignmentsAssigned - $assignmentsApproved }} opdrachten te gaan.
        <br/>
        <b>   - Niet toegewezen: </b> Je hebt nog {{  $assignmentsAll }} opdrachten die niet toegewezen zijn. Vraag je docent om ze te openen.
        <br/>
        <br/>
        <b>Je kan examineren op de volgende werkprocessen:</b>
        {{-- Hiervoor moet een join gemaakt worden zodat we kunnen checken welke werkprocessen precies voltooid zijn.
            Dit is dus een work in progress onderdeel, specifiek de foreach. --}}
        @foreach($workprocesses as $workprocess) 
            <br/>
            <b>   - {{ $workprocess->workprocess_title }}: </b>{{ $workprocess->assignments->where('phase', ' ')->count() }} / {{ $workprocess->assignments->count() }} opdrachten goedgekeurd.
            Je hebt nog {{ $workprocess->assignments->count() - $workprocess->assignments->where('progress', 'Goedgekeurd')->count() }} opdrachten te gaan.
        @endforeach
    @endif

    <table class="table-auto w-full text-left">
        <tr>
            <th class="w-24">Opdracht</th>
            <th class="w-5">Opengezet door</th>
            <th class="w-5">Fase</th>
            <th class="w-2"></th>
        </tr>

        <tbody>
            @foreach($userassignments as $userassignment) 
                <tr class="      
                    {{-- Veranderd de classes gebaseerd op de waarde van userassignment->progress --}}
                    {{ $userassignment->progress == 'Niet beoordeeld' ? 'nietBeoordeeld' : '' }}
                    {{ $userassignment->progress == 'Goedgekeurd' ? 'goedgekeurd' : '' }}
                    {{ $userassignment->progress == 'Afgekeurd' ? 'afgekeurd' : '' }}
                ">
                    <td class="w-30"><b><p>{{ $userassignment->assignment->title }}</p></b></td>
                    <td class="w-5"><p>
                    @if ($userassignment->docent->name)
                        <p>{{ $userassignment->docent->name }}</p>
                    @else
                        <p>Geen gebruiker gevonden.</p>
                    @endif                    
                    </p></td>

                    <td class="w-5"><p>{{ $userassignment->phase }}</p></td>
                    <td class="w-5 
                    {{-- Veranderd de classes gebaseerd op de waarde van userassignment->progress --}}
                    {{ $userassignment->progress == 'Niet beoordeeld' ? 'nietBeoordeeld_text' : '' }}
                    {{ $userassignment->progress == 'Goedgekeurd' ? 'goedgekeurd_text' : '' }}
                    {{ $userassignment->progress == 'Afgekeurd' ? 'afgekeurd_text' : '' }}

                    "><p>{{ $userassignment->progress }}</p></td>
                    

                    <td class="w-5"><a href="{{ route('userassignments.view', ['id' => $userassignment]) }}"><p>Bekijken</p></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br/>

    {{ $userassignments -> links() }}
</x-app-layout>