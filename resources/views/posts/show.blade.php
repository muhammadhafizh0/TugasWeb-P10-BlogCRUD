@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <x-card>
        <h1 class="text-2xl font-bold mb-2">{{ $post->title }}</h1>
        <p class="text-gray-500 text-sm mb-4">Dibuat: {{ $post->created_at->format('d M Y H:i') }}</p>
        <p class="text-gray-800 whitespace-pre-line">{{ $post->body }}</p>

        <div class="mt-6 flex gap-3">
            <a href="{{ route('posts.index') }}" class="text-gray-600">← Kembali</a>
            <a href="{{ route('posts.edit', $post) }}" class="text-yellow-600">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                  onsubmit="return confirm('Yakin hapus post ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600">Hapus</button>
            </form>
        </div>
    </x-card>
@endsection
