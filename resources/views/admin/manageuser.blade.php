<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Post') }}
        </h2>
    </x-slot>
    
    <x-auth-card>
    @foreach ($users as $user)
        <div class="py-6">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2>{{ $user->name }}</h2>
                        <h4>{{ $user->email }}</h4>
                        <p>by: {{ $user->role()->first()->name }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach<!--
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>-->

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('updateuser', $user->id) }}">
            @csrf

            <div  class="mt-4">
                <x-label for="role_id" :value="__('Content')" />
                <select name="role_id" id="pet-select" :value="old('role_id')">
                    <option value="">--Please choose an option--</option>
                    <option value="3">Author</option>
                    <option value="2">Moderator</option>
                    <option value="1">Admin</option>
                </select>
               
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-button class="ml-4">
                    {{ __('Update') }}
                </x-button>
            </div>
            <div class="flex items-center justify-end mt-4">

        </form>

        <form method="POST" action="{{ route('destroyuser', $user->id) }}">
            @csrf
            {{method_field('delete')}}
            <x-button class="ml-4">
                {{ __('Delete User') }}
            </x-button>

        </form>


    </x-auth-card>

</x-app-layout>