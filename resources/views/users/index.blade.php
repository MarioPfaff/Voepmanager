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

    <h1 class="text-2xl font-bold">Accounts</h1>

    <x-primary-button class="my-6">
        <a href="{{ route('users.create') }}">Maak een account aan</a>
    </x-primary-button>

    <table class="table-auto w-full text-left">
        <tr>
            <th class="w-5"></th>
            <th class="w-5"></th>
            <th class="w-10">Identificatie</th>
            <th class="w-24">Naam</th>
            <th class="w-5">Email</th>                            
            <th class="w-24">Rol</th>
        </tr>

    <tbody>
        @foreach($users as $user) 
            <tr class="">
                <td class="w-5"><a href="{{ route('users.edit', ['user' => $user]) }}"><p><img src="{{ asset('images/edit.svg')}}" alt="Edit"></p></a></td>
                <td class="w-5"><p><a href="users/destroy/{{ $user->id }}"><img src="{{ asset('images/delete.svg')}}" alt="Delete"></p></a></td>
                <td class="w-10"><p>{{ $user->id }}</p></td>
                <td class="w-30"><b><p>{{ $user->name }}</p></b></td>
                <td class="w-5"><p>{{ $user->email }}</p></td>
                <td class="w-15"><p>{{ $user->roles->pluck("name")->implode('-') }}</p></td>
            </tr>
        @endforeach
    </tbody>
    </table>
    <br/>
    {{ $users -> links() }}

</x-app-layout>