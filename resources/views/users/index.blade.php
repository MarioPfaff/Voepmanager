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

                    <h1 class="text-2xl font-bold">Users</h1>

                    <x-primary-button class="my-6">
                        <a href="{{ route('users.create') }}">Add New User</a>
                    </x-primary-button>

                    <table class="table-auto w-full text-left">
                        <tr>
                            <th class="w-24">Name</th>
                            <th class="w-5">Email</th>
                            <th class="w-10">ID</th>
                            <th class="w-24">Role</th>
                            <th class="w-5"></th>
                            <th class="w-5"></th>
                        </tr>

                        <tbody>
                            @foreach($users as $user) 
                                <tr class="">
                                    <td class="w-30"><b><p>{{ $user->name }}</p></b></td>
                                    <td class="w-5"><p>{{ $user->email }}</p></td>
                                    <td class="w-10"><p>{{ $user->id }}</p></td>
                                    <td class="w-15"><p>{{ $user->roles->pluck("name")->implode('-') }}</p></td>
                                    <td class="w-5"><a href="{{ route('users.edit', ['user' => $user]) }}"><p>Edit</p></a></td>
                                    <td class="w-5"><p><a href="users/destroy/{{ $user->id }}">Delete</p></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br/>
                    {{ $users -> links() }}
</x-app-layout>