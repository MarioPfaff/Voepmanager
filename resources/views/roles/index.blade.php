<x-app-layout>
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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

    <h1 class="text-2xl font-bold">Roles</h1>

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
                    <td class="w-5"><p><a href="roles/destroy/{{ $role->id }}">Delete</p></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br/>
    <script type="text/javascript" defer src="{{ asset('js/script.js') }}"></script>
</x-app-layout>