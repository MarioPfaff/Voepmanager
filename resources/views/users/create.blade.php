<x-app-layout>

    <x-back-button/>
    <h1 class="text-2xl font-bold mb-8">Create User</h1>

    @if($errors->any())
        <x-notification-danger>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-notification-danger>
    @endif

    <form method="post" action="{{route('users.store')}}">
        @csrf
        @method('POST')

        <div>
            <x-input-label>Name</x-input-label>
            <x-text-input><input type="text" name="name"  placeholder="Your name ..."/></x-text-input>
        </div>
        <div>
            <x-input-label>Email</x-input-label>
            <x-text-input><input type="text" name="email"  placeholder="Your email ..."/></x-text-input>
        </div>
        <div> 
            <x-input-label>Password</x-input-label>
            <x-text-input><input type="text" name="password"  placeholder="Your password ..."/></x-text-input>
        </div>
        <br/>
        <div>
            <x-primary-button>
                <input type="submit" value="Create A New User"/>
            </x-primary-button> 
        </div>
    </form>

</x-app-layout>