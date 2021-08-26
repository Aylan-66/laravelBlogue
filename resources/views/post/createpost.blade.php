<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <x-auth-card><!--
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>-->

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-8" :errors="$errors" />

        <form method="POST" action="{{ route('createPost') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="title" :value="__('Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            </div>

            <!-- Email Address -->
            <div>
                <x-label for="content" :value="__('Content')" />

                <x-input id="content" class="block mt-1 w-full" type="text" name="content" :value="old('content')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-button class="ml-4">
                    {{ __('Publish') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>