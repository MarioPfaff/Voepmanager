<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold mb-8">Gebruiker aanpassen: {{$user->name}}</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    <form method="POST"  action="{{ route('users.update', ['user' => $user]) }}">
        @csrf
        @method('PUT')

        <div>
            <x-input-label>Naam</x-input-label>
            <x-text-input type="text" name="name" value="{{$user->name}}"></x-text-input>
        </div>
        <div>
            <x-input-label>Email</x-input-label>
            <x-text-input type="text" name="email" value="{{$user->email}}"></x-text-input>
        </div>

        <div>
            <x-input-label>Rol</x-input-label>

            <select name="roles">
                @foreach($roles as $role)
                    <option value="{{$role->name}}" 
                        {{-- Makes a check on the current user role to select it for this field.
                             Adds attribute 'selected' if true. --}}
                        @if ($user->roles->pluck("name")->contains($role->name)) 
                            selected
                        @endif
                        >
                            {{$role->id}}: {{$role->name}}</option>
                @endforeach
            </select> 
        </div>

        <div> 
            <x-input-label>Wachtwoord</x-input-label>
            <x-text-input type="password" name="password" placeholder="New password ..."></x-text-input>
        </div>
        
            <x-primary-button class="my-6" type="submit"> Toepassen </x-primary-button>
        </div>
    </form>

</x-app-layout>