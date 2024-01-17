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

    {{-- een filter om de fase te filteren --}}
    <select id="filterPhase" name="phase">
        <option value=""> Alle </option>
        @foreach($phases as $phase)
            <option value="{{$phase}}">
                {{$phase}}
            </option>
        @endforeach
    </select>

    {{-- Dit is de tabel met rijen uit de userassignments tabel waar de docent_id hetzelfde 
        is als de ingelogde user --}}
    <table id="userassignmentTable" class="table-auto w-full text-left">
        <tr>
            <th class="w-24">Opdracht</th>
            <th class="w-5">Ingeleverd door</th>
            <th class="w-5">Fase</th>
            <th class="w-5">Progressie</th>
            <th class="w-2"></th>
        </tr>

        <tbody>
            @foreach($teacherassignments as $teacherassignment) 
                <tr class="">
                    <td class="w-30"><b><p>{{ $teacherassignment->assignment->title }}</p></b></td>
                    <td class="w-5"><p>
                    @if ($teacherassignment->student->name)
                        <p>{{ $teacherassignment->student->name }}</p>
                    @else
                        <p>Geen gebruiker gevonden.</p>
                    @endif                    
                    </p></td>

                    <td class="w-5"><p>{{ $teacherassignment->phase }}</p></td>
                    <td class="w-5"><p>{{ $teacherassignment->progress }}</p></td>
                    {{-- een if statement om de link naar de beoordeel pagina alleen weer te geven bij opdrachten 
                        die zijn ingeleverd --}}
                    <td class="w-5">
                        @if (trim($teacherassignment->phase) === 'Ingeleverd, niet nagekeken' || trim($teacherassignment->phase) === 'Nagekeken')
                            <a href="{{ route('teacherassignments.edit', ['teacherassignment' => $teacherassignment->id]) }}">
                                <p>Beoordelen</p>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br/>

    {{ $teacherassignments -> links() }}
</x-app-layout>