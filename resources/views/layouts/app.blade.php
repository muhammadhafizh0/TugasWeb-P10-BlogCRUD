<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog') - Tugas Rutin 10</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-slate-800 text-white p-4">
        <div class="max-w-3xl mx-auto flex justify-between items-center">
            <a href="{{ route('posts.index') }}" class="font-bold text-lg">📝 Blog CRUD</a>
            <a href="{{ route('posts.create') }}"
               class="bg-orange-500 px-3 py-1 rounded hover:bg-orange-600">+ Post Baru</a>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto mt-8 px-4 pb-16">
        {{-- Flash message sukses/gagal --}}
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif

        @if (session('error'))
            <x-alert type="error" :message="session('error')" />
        @endif

        @yield('content')
    </main>
</body>
</html>
