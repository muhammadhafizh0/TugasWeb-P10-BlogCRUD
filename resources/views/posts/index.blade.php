@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Post</h1>

    <form method="GET" action="{{ route('posts.index') }}" class="mb-4 flex gap-2">
        <input type="text" name="q" value="{{ request('q') }}"
               placeholder="Cari judul atau isi..."
               class="border rounded px-3 py-2 flex-1">
        <button class="bg-slate-800 text-white px-4 rounded">Cari</button>
    </form>

    @forelse ($posts as $post)
        <x-card>
            <h2 class="text-xl font-semibold">
                <a href="{{ route('posts.show', $post) }}" class="hover:text-orange-500">
                    {{ $post->title }}
                </a>
            </h2>
            <p class="text-gray-600 mt-2">{{ Str::limit($post->body, 120) }}</p>

            <div class="mt-4 flex gap-3">
                <a href="{{ route('posts.show', $post) }}" class="text-sm text-blue-600">Detail</a>
                <a href="{{ route('posts.edit', $post) }}" class="text-sm text-yellow-600">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST"
                      onsubmit="return confirm('Yakin hapus post ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm text-red-600">Hapus</button>
                </form>
            </div>
        </x-card>
    @empty
        <p>Belum ada post.</p>
    @endforelse

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
