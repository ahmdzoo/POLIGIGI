<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-xl text-orange-600 leading-tight italic">Buat Artikel Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-xl rounded-3xl border border-orange-100">
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-black text-gray-700">Judul Artikel:</label>
                        <input type="text" name="judul" class="w-full border-orange-200 rounded-xl p-3 focus:ring-orange-500 focus:border-orange-500" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block font-black text-gray-700">Gambar Thumbnail:</label>
                        <input type="file" name="image" class="w-full border border-dashed border-orange-300 rounded-xl p-2 bg-orange-50/50" accept="image/*">
                        <p class="text-[10px] text-gray-400 mt-1 italic font-medium">*Format: JPG, PNG, WEBP (Maks 2MB)</p>
                    </div>

                    <div class="mb-6">
                        <label class="block font-black text-gray-700">Isi Konten:</label>
                        <textarea name="konten" class="w-full border-orange-200 rounded-xl p-3 focus:ring-orange-500 focus:border-orange-500" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-full font-black shadow-lg shadow-orange-200 transition-all uppercase tracking-widest text-xs">
                        Terbitkan Artikel
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>