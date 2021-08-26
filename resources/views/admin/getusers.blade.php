<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users list') }}
        </h2>
    </x-slot>
    @foreach ($users as $user)
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('showuser', $user->id) }}">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2>{{ $user->name }}</h2>
                        <h4>{{ $user->email }}</h4>
                        <p>by: {{ $user->role()->first()->name }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
	@endforeach

</x-app-layout>
