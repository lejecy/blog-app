<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('user')
            ->published()
            ->latest('published_at')
            ->latest()
            ->paginate(9);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post): View
    {
        // Only published posts are visible for guests; authors can see own drafts
        if (! $post->is_published && (! auth()->check() || auth()->id() !== $post->user_id)) {
            abort(404);
        }

        $post->load('user');

        return view('posts.show', compact('post'));
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['slug'] = Str::slug($data['title']).'-'.Str::lower(Str::random(6));
        $data['is_published'] = $request->boolean('is_published');
        $data['published_at'] = $data['is_published'] ? now() : null;

        $post = Post::create($data);

        return redirect()->route('posts.show', $post)->with('success', 'Post created successfully.');
    }

    public function edit(Post $post): View
    {
        $this->authorizeOwner($post);

        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $this->authorizeOwner($post);

        $data = $request->validated();
        // checkbox unchecked => missing key => false (draft). Use has+boolean to avoid fallback to old value
        $data['is_published'] = $request->has('is_published') ? $request->boolean('is_published') : false;
        $data['published_at'] = $data['is_published'] ? ($post->published_at ?? now()) : null;

        $post->update($data);

        return redirect()->route('posts.show', $post)->with('success', 'Post updated.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $this->authorizeOwner($post);

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }

    public function myPosts(): View
    {
        $posts = Post::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('posts.my', compact('posts'));
    }

    private function authorizeOwner(Post $post): void
    {
        if (auth()->id() !== $post->user_id) {
            abort(403, 'You can only manage your own posts.');
        }
    }
}
