<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @foreach ($posts as $post)
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('editpost', $post->id) }}">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2>{{ $post->title }}</h2>
                        <h4>{{ $post->content }}</h4>
                        <p>by: {{ App\Models\Post::GetName($post->id) }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
	@endforeach

</x-app-layout>
