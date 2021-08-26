<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Post') }}
        </h2>
    </x-slot>
    
    <x-auth-card>
    @foreach ($posts as $post)
        <div class="py-6">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2>{{ $post->title }}</h2>
                        <h4>{{ $post->content }}</h4>
                        <p>by: {{ $post->with('user')->where('id', $post->id)->first()->user()->first()->name }}</p>
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

        <form method="POST" action="{{ route('updatepost', $post->id) }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="title" :value="__('Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            </div>

            <!-- Email Address -->
            <div  class="mt-4">
                <x-label for="content" :value="__('Content')" />

                <x-input id="content" class="block mt-1 w-full" type="text" name="content" :value="old('content')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-button class="ml-4">
                    {{ __('Update') }}
                </x-button>
            </div>
            <div class="flex items-center justify-end mt-4">

        </form>
        @if ($post->user_id == Auth::user()->id)
        <form method="POST" action="{{ route('destroy', $post->id) }}">
            @csrf
            {{method_field('delete')}}
            <x-button class="ml-4">
                {{ __('Delete Post') }}
            </x-button>

        </form>
        @endif

    </x-auth-card>

</x-app-layout>