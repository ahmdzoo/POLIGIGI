<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-black text-2xl text-orange-600 leading-tight italic uppercase tracking-tighter">
                {{ __('Edit Artikel Edukasi') }}
            </h2>
            <a href="{{ route('articles.index') }}" class="inline-flex items-center px-6 py-2 bg-gray-100 hover:bg-gray-200 text-gray-600 font-black rounded-full transition-all text-xs uppercase tracking-widest active:scale-95">
                ← Batal
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-orange-50/20 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl rounded-[2.5rem] border border-orange-100 p-10">
                
                <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-[10px] font-black text-orange-600 uppercase tracking-widest ml-1 mb-2 italic">Judul Artikel</label>
                        <input type="text" name="judul" value="{{ old('judul', $article->judul) }}" 
                            class="w-full border-2 border-orange-100 rounded-2xl p-4 bg-orange-50/30 text-gray-800 font-bold shadow-sm focus:border-orange-500 focus:ring-0 transition-all" required>
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-orange-600 uppercase tracking-widest ml-1 mb-2 italic">Gambar Artikel (Opsional)</label>
                        @if($article->image)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $article->image) }}" class="w-40 h-24 object-cover rounded-xl border-2 border-orange-100 shadow-sm">
                                <p class="text-[9px] text-gray-400 mt-1 italic font-bold">* Gambar saat ini</p>
                            </div>
                        @endif
                        <input type="file" name="image" class="w-full border-2 border-dashed border-orange-200 rounded-2xl p-4 bg-orange-50/10 text-xs font-bold text-gray-500">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-orange-600 uppercase tracking-widest ml-1 mb-2 italic">Isi Konten Edukasi</label>
                        <textarea name="konten" rows="8" 
                            class="w-full border-2 border-orange-100 rounded-2xl p-4 bg-orange-50/30 text-gray-800 font-medium shadow-sm focus:border-orange-500 focus:ring-0 transition-all" required>{{ old('konten', $article->konten) }}</textarea>
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-2xl shadow-xl shadow-orange-100 text-xs font-black uppercase tracking-[0.2em] transition-all active:scale-95 italic">
                            Update Artikel Sekarang →
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>