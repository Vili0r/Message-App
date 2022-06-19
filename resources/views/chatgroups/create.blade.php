<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Create a Chat Group') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-3" />

    <div class="card-body">
        <form method="POST" action="{{ route('chatgroups.store') }}">
            @csrf

            <div class="mb-3">
                <x-jet-label value="{{ __('Name') }}" />

                <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                <x-jet-input-error for="name"></x-jet-input-error>
            </div>

            <div class="mb-3">
                <x-jet-label value="{{ __('Description') }}" />

                <x-jet-input class="{{ $errors->has('description') ? 'is-invalid' : '' }}" type="description" name="description"
                                :value="old('description')" required />
                <x-jet-input-error for="description"></x-jet-input-error>
            </div>

            <div class="mb-0">
                <x-jet-button class="btn btn-primary">
                    {{ __('Create') }}
                </x-jet-button>
            </div>
        </form>
    </div>
    
</x-app-layout>