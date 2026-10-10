@extends('layouts.app')

@section('title', 'Tambah Post')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Post Baru</h1>

    <x-card>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="w-full border rounded px-3 py-2 @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Isi</label>
                <textarea name="body" rows="6"
                          class="w-full border rounded px-3 py-2 @error('body') border-red-500 @enderror">{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('posts.index') }}" class="ml-2 text-gray-600">Batal</a>
        </form>
    </x-card>
@endsection
