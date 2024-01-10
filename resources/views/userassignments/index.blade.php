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

    <table class="table-auto w-full text-left">
        <tr>
            <th class="w-24">Opdracht</th>
            <th class="w-5">Opengezet door</th>
            <th class="w-5">Fase</th>
            <th class="w-2"></th>
        </tr>

        <tbody>
            @foreach($userassignments as $userassignment) 
                <tr class="">
                    <td class="w-30"><b><p>{{ $userassignment->assignment->title }}</p></b></td>
                    <td class="w-5"><p>
                    @if ($userassignment->assignment->authors)
                        <p>{{ $userassignment->assignment->authors->name }}</p>
                    @else
                        <p>{{ $userassignment->assignment->created_at }}</p>
                    @endif                    
                    </p></td>

                    <td class="w-5"><p>{{ $userassignment->phase }}</p></td>


                </tr>
            @endforeach
        </tbody>
    </table>
    <br/>

    {{ $userassignments -> links() }}
</x-app-layout>