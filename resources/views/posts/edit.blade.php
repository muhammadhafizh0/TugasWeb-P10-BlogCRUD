@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Post</h1>

    <x-card>
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                       class="w-full border rounded px-3 py-2 @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Isi</label>
                <textarea name="body" rows="6"
                          class="w-full border rounded px-3 py-2 @error('body') border-red-500 @enderror">{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('posts.show', $post) }}" class="ml-2 text-gray-600">Batal</a>
        </form>
    </x-card>
@endsection
