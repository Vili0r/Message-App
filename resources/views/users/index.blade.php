<x-app-layout>
    <x-slot name="header">
        <div class="col-sm-10">
            <h2 class="h4 font-weight-bold">
                {{ __('Manage Users') }}
            </h2>
        </div> 
    </x-slot>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">DM</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    @auth
                    <td>
                        @livewire('start-direct-message', ['userId' => $user->id])
                    </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table> 
</x-app-layout>