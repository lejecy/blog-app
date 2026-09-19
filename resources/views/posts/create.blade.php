<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="excerpt" :value="__('Excerpt (optional, max 300)')" />
                        <x-text-input id="excerpt" class="block mt-1 w-full" type="text" name="excerpt" :value="old('excerpt')" />
                        <x-input-error :messages="$errors->get('excerpt')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="body" :value="__('Body')" />
                        <textarea id="body" name="body" rows="12" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm" required>{{ old('body') }}</textarea>
                        <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_published" value="1" checked class="rounded border-gray-300 text-blue-600">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Publish immediately</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('posts.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900">Cancel</a>
                        <x-primary-button>{{ __('Publish') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
