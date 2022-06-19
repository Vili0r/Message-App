<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-sm-10">
                <h2 class="h4 font-weight-bold">
                    {{ __('Start a DM') }}
                </h2>
            </div>
            <div class="col-sm">
                <a href="{{ route('chatgroups.create') }}">
                    <x-gmdi-group-add-s class="contacts-list-img"/>
                </a>
            </div>
        </div>
    </x-slot>

    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    
    @auth   
    <div class="container">
        <div class="pt-2 row">
            <div class="col-md-4">
                {{-- Contacts --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Conversations</h3>
                    </div>
                    <div class="card-body">
                        <ul class="contacts-list">
                            <livewire:chat />
                            <!-- /.contacts-list-info -->
                            <!-- End Contact Item -->
                        </ul>
                    </div>
                </div>
                    {{-- Groups --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Groups</h3>
                    </div>
                    <div class="card-body">
                        <ul class="contacts-list">
                            @forelse ($chatgroups as $chatgroup)
                                <li class="bg-light">
                                    <div class=row>
                                        <div class="col-md-8">
                                            <a href="{{ route('chatgroups.edit', $chatgroup) }}">
                                                {{ $chatgroup->name }}
                                            </a>
                                        </div>
                                        {{-- Delete --}}
                                        <div class="col-md-4">
                                            <form method="POST" action="{{ route('chatgroups.destroy', $chatgroup) }}" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure')" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                No groups create yet.
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Chat --}}
            <livewire:chat-message :chats=$chats :wire:key="'chat-message'.$chats->id"/>
        </div>
    </div>
    @endauth
</x-app-layout>