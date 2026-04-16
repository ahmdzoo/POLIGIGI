<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-orange-600 leading-tight italic uppercase tracking-tighter">
            {{ __('Kelola Artikel Edukasi') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-orange-50/20 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-2xl rounded-[2.5rem] border border-orange-100">
                
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-8 bg-orange-500 rounded-full shadow-lg shadow-orange-200"></div>
                        <h3 class="font-black text-gray-800 uppercase italic tracking-tighter">Daftar Artikel Konten</h3>
                    </div>
                    
                    <a href="{{ route('articles.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-full text-xs font-black shadow-lg shadow-orange-200 uppercase tracking-widest active:scale-95 transition-all">
                        + Tambah Artikel Baru
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="bg-orange-50/50 text-orange-800 text-[10px] font-black uppercase tracking-widest italic opacity-70">
                                <th class="p-4 rounded-l-2xl text-center w-24">Visual</th>
                                <th class="p-4">Judul Artikel</th>
                                <th class="p-4">Ringkasan Konten</th>
                                <th class="p-4 text-center rounded-r-2xl">Aksi Manajemen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                            <tr class="bg-white hover:bg-orange-50/50 transition-all shadow-sm group">
                                <td class="p-4 border-y border-l rounded-l-2xl text-center border-gray-50">
                                    @if($article->image)
                                        <div class="w-20 h-14 overflow-hidden rounded-xl shadow-inner border border-orange-100">
                                            <img src="{{ asset('storage/' . $article->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        </div>
                                    @else
                                        <div class="w-20 h-14 bg-gray-100 rounded-xl flex items-center justify-center text-[8px] italic text-gray-400 font-bold uppercase tracking-tighter">No Image</div>
                                    @endif
                                </td>

                                <td class="p-4 border-y border-gray-50">
                                    <div class="font-black text-gray-800 uppercase leading-tight text-sm tracking-tight group-hover:text-orange-600 transition-colors">
                                        {{ $article->judul }}
                                    </div>
                                    <div class="text-[9px] text-gray-400 font-bold mt-1 italic uppercase tracking-tighter">
                                        Post: {{ $article->created_at->diffForHumans() }}
                                    </div>
                                </td>

                                <td class="p-4 border-y border-gray-50">
                                    <p class="text-[11px] text-gray-500 italic font-medium leading-relaxed">
                                        {{ Str::limit(strip_tags($article->konten), 65) }}
                                    </p>
                                </td>

                                <td class="p-4 border-y border-r rounded-r-2xl border-gray-50 text-center">
                                    <div class="flex justify-center items-center gap-3">
                                        <a href="{{ route('articles.edit', $article->id) }}" class="inline-flex items-center px-4 py-1.5 bg-amber-50 text-amber-600 border border-amber-100 hover:bg-amber-500 hover:text-white rounded-xl transition-all font-black text-[10px] uppercase tracking-widest italic shadow-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Hapus artikel {{ $article->judul }}?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-4 py-1.5 bg-red-50 text-red-600 border border-red-100 hover:bg-red-500 hover:text-white rounded-xl transition-all font-black text-[10px] uppercase tracking-widest italic shadow-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($articles->isEmpty())
                    <div class="text-center py-20 bg-orange-50/30 rounded-[2.5rem] border-4 border-dashed border-orange-100 mt-6">
                        <p class="text-sm font-bold text-gray-400 uppercase italic tracking-widest">Belum ada konten edukasi yang diterbitkan</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>