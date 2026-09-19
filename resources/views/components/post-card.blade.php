@props(['post'])

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition">
    <div class="p-6">
        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
            <span>{{ $post->user->name }}</span>
            <span class="mx-2">•</span>
            <span>{{ $post->published_at?->format('d M Y') ?? $post->created_at->format('d M Y') }}</span>
            @if(! $post->is_published)
                <span class="ml-2 px-2 py-0.5 bg-yellow-100 text-yellow-800 text-xs rounded">Draft</span>
            @endif
        </div>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
            <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-600">{{ $post->title }}</a>
        </h3>
        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">{{ $post->excerpt }}</p>
        <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Читать →</a>
    </div>
</div>
