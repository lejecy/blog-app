<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('My Posts') }}
            </h2>
            <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">+ New Post</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($posts->isEmpty())
                        <p class="text-center text-gray-500 py-8">You have no posts yet. <a href="{{ route('posts.create') }}" class="text-blue-600">Create one</a></p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b text-left text-gray-500">
                                        <th class="pb-2">Title</th>
                                        <th class="pb-2">Status</th>
                                        <th class="pb-2">Date</th>
                                        <th class="pb-2 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr class="border-b hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <td class="py-3">
                                                <a href="{{ route('posts.show', $post) }}" class="font-medium text-gray-900 dark:text-gray-100 hover:text-blue-600">{{ Str::limit($post->title, 50) }}</a>
                                            </td>
                                            <td class="py-3">
                                                @if($post->is_published)
                                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded">Published</span>
                                                @else
                                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded">Draft</span>
                                                @endif
                                            </td>
                                            <td class="py-3 text-gray-500">{{ $post->created_at->format('d M Y') }}</td>
                                            <td class="py-3 text-right flex justify-end gap-2">
                                                <a href="{{ route('posts.edit', $post) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                                <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Delete?')">
                                                    @csrf @method('DELETE')
                                                    <button class="text-red-600 hover:text-red-800">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">{{ $posts->links() }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
