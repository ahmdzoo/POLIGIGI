<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-xl text-orange-600 leading-tight italic">Kelola Artikel Edukasi</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-xl rounded-3xl border border-orange-100">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-black text-gray-800 uppercase tracking-tighter">Daftar Artikel</h3>
                    <a href="{{ route('articles.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-full text-xs font-black shadow-md uppercase tracking-widest">
                        + Tambah Artikel
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-2">
                        <thead>
                            <tr class="bg-orange-50 text-orange-800 text-[10px] font-black uppercase tracking-widest">
                                <th class="p-4 rounded-l-xl">Gambar</th>
                                <th class="p-4">Judul</th>
                                <th class="p-4">Konten</th>
                                <th class="p-4 text-center rounded-r-xl">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                            <tr class="bg-white hover:bg-orange-50 transition-colors shadow-sm">
                                <td class="p-3 border-y border-l rounded-l-xl">
                                    @if($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}" class="w-16 h-12 object-cover rounded-lg shadow-sm">
                                    @else
                                        <div class="w-16 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-[8px] italic text-gray-400">No Image</div>
                                    @endif
                                </td>
                                <td class="p-3 border-y font-bold text-gray-800">{{ $article->judul }}</td>
                                <td class="p-3 border-y text-xs text-gray-500 italic leading-tight">{{ Str::limit($article->konten, 60) }}</td>
                                <td class="p-3 border-y border-r rounded-r-xl text-center">
                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-black text-[10px] uppercase underline italic">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>