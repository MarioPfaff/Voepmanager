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

    <h1 class="text-2xl font-bold">Roles</h1>

    <x-primary-button class="my-6">
        <a href="">Add New Role</a>
    </x-primary-button>

    <table class="table-auto w-full text-left">
        <tr class="">
            <th class="w-20">ID</th>
            <th class="w-72">Role</th>
            <th class="w-5"></th>
            <th class="w-5"></th>
        </tr>

        <tbody>
            @foreach($roles as $role) 
                <tr class="">
                    <td class="w-20"><b><p>{{ $role->id }}</p></b></td>
                    <td class="w-72"><p>{{ $role->name }}</p></td>
                    <td class="w-5"><a href="roles/edit/{{ $role->id }}"><p>Edit</p></a></td>
                    <td class="w-5"><p><a href="roles/destroy/ {{-- Route (route_to) for destroy must go here! --}}">Delete</p></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br/>
</x-app-layout>