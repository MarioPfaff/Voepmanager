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

    <h1 class="text-2xl font-bold">Rollen</h1>

    <table class="table-auto w-full text-left">
        <tr class="">
            <th class="w-5"></th>
            <th class="w-5"></th>
            <th class="w-20">Identificatie</th>
            <th class="w-72">Rol</th>
        </tr>

        <tbody>
            @foreach($roles as $role) 
                <tr class="">
                    <td class="w-5"><a href="roles/edit/{{ $role->id }}"><p><img src="{{ asset('images/edit.svg')}}" alt="Edit"></p></a></td>
                    <td class="w-5"><p><a href="roles/destroy/{{ $role->id }}"><img src="{{ asset('images/delete.svg')}}" alt="Delete"></p></a></td>
                    <td class="w-20"><b><p>{{ $role->id }}</p></b></td>
                    <td class="w-72"><p>{{ $role->name }}</p></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br/>
</x-app-layout>