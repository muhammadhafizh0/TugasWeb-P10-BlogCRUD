<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

/**
 * Dibuat dengan: php artisan make:controller PostController --resource
 * Route Model Binding aktif lewat getRouteKeyName() di Model Post (slug).
 */
class PostController extends Controller
{
    /**
     * 1. index - daftar post + pagination + bonus pencarian
     */
    public function index(Request $request): View
    {
        $posts = Post::search($request->query('q'))
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('posts.index', compact('posts'));
    }

    /**
     * 2. create - form tambah post
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * 3. store - simpan post baru
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string|min:10',
        ]);

        Post::create($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post berhasil ditambahkan.');
    }

    /**
     * 4. show - detail post (Route Model Binding otomatis via slug)
     */
    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }

    /**
     * 5. edit - form edit post
     */
    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * 6. update - simpan perubahan post
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string|min:10',
        ]);

        $post->update($validated);

        return redirect()
            ->route('posts.show', $post)
            ->with('success', 'Post berhasil diperbarui.');
    }

    /**
     * 7. destroy - hapus post (soft delete)
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post berhasil dihapus.');
    }
}
