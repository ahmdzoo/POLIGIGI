<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Artikel Edukasi</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <div class="flex justify-between mb-4">
                    <h3 class="font-bold">Daftar Artikel</h3>
                    <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded text-sm font-bold">+ Tambah Artikel</a>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">Judul</th>
                            <th class="border p-2">Konten (Singkat)</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td class="border p-2">{{ $article->judul }}</td>
                            <td class="border p-2">{{ Str::limit($article->konten, 50) }}</td>
                            <td class="border p-2">
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 font-bold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>