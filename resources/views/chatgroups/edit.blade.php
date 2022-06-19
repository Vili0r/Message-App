<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Update Chat Group') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-3" />

    <div class="card-body">
        <form method="POST" action="{{ route('chatgroups.update', $chatgroup) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <x-jet-label value="{{ __('Name') }}" />

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ $chatgroup->name }}" required autocomplete="name" autofocus>
                <x-jet-input-error for="name"></x-jet-input-error>
            </div>

            <div class="mb-3">
                <x-jet-label value="{{ __('Description') }}" />

                <input id="description" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="description" value="{{ $chatgroup->description }}" required autocomplete="description" autofocus>
                <x-jet-input-error for="description"></x-jet-input-error>
            </div>

            <div class="mb-0">
                <x-jet-button class="btn btn-primary">
                    {{ __('Update') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</x-app-layout>