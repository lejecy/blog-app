<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a href="{{ route('posts.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900">← Back to posts</a>
            @auth
                @if(auth()->id() === $post->user_id)
                    <div class="flex gap-2">
                        <a href="{{ route('posts.edit', $post) }}" class="bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700">Edit</a>
                        <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md text-sm hover:bg-red-700">Delete</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">{{ session('success') }}</div>
            @endif

            <article class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                        <span class="font-medium text-gray-700 dark:text-gray-300">{{ $post->user->name }}</span>
                        <span class="mx-2">•</span>
                        <span>{{ $post->published_at?->format('d M Y, H:i') ?? $post->created_at->format('d M Y, H:i') }}</span>
                        @if(! $post->is_published)
                            <span class="ml-2 px-2 py-0.5 bg-yellow-100 text-yellow-800 text-xs rounded">Draft</span>
                        @endif
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ $post->title }}</h1>

                    @if($post->excerpt)
                        <p class="text-lg text-gray-600 dark:text-gray-300 italic border-l-4 border-blue-500 pl-4 mb-6">{{ $post->excerpt }}</p>
                    @endif

                    <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 whitespace-pre-wrap leading-relaxed">{{ $post->body }}</div>
                </div>
            </article>
        </div>
    </div>
</x-app-layout>
