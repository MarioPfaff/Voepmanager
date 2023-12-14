<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold mb-8">Aanpassen: {{$role->name}}</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    <form method="POST"  action="{{route('roles.update', ['role' => $role])}}">
        @csrf
        @method('PUT')

        <div>
            <x-input-label>Naam</x-input-label>
            <x-text-input type="text" name="name" value="{{$role->name}}"></x-text-input>
        </div>

        <div>
            <x-input-label>Toestemmingen</x-input-label>
                @foreach($permissions as $permission)
                    <input type="checkbox" name="{{ $permission->id }}" value="{{ $permission->id }}"
                    @if ($role->permissions->pluck("name")->contains($permission->name)) 
                        checked
                    @endif                    
                    />
                    <label for="{{ $permission->id }}"> {{ $permission->name }} </label>
                @endforeach
        </div>
        <br/>
        <div>
            <x-primary-button type="submit"> Opslaan </x-primary-button>
        </div>
    </form>
</x-app-layout>