<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-black text-2xl text-orange-600 leading-tight italic uppercase tracking-tighter">
                {{ __('Tambah Dokter Baru') }}
            </h2>
            <a href="{{ route('doctors.index') }}" class="inline-flex items-center px-6 py-2 bg-gray-100 hover:bg-gray-200 text-gray-600 font-black rounded-full transition-all text-xs uppercase tracking-widest active:scale-95">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-orange-50/20 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl rounded-[2.5rem] border border-orange-100 p-10">
                
                <div class="flex items-center gap-3 mb-10">
                    <div class="w-2 h-8 bg-orange-500 rounded-full shadow-lg shadow-orange-200"></div>
                    <div>
                        <h3 class="text-lg font-black text-gray-800 uppercase italic tracking-tighter">Formulir Tenaga Medis</h3>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest italic">Lengkapi data dokter untuk ditambahkan ke sistem</p>
                    </div>
                </div>

                <form action="{{ route('doctors.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="nama_dokter" class="block text-[10px] font-black text-orange-600 uppercase tracking-widest ml-1 mb-2 italic">
                            Nama Lengkap Dokter
                        </label>
                        <div class="relative group">
                            <input type="text" name="nama_dokter" id="nama_dokter" 
                                class="w-full border-2 border-orange-100 rounded-2xl p-4 bg-orange-50/30 text-gray-800 font-bold shadow-sm focus:border-orange-500 focus:ring-0 transition-all @error('nama_dokter') border-red-500 @enderror" 
                                placeholder="Contoh: drg. Hadi Haris" value="{{ old('nama_dokter') }}" required>
                        </div>
                        @error('nama_dokter')
                            <p class="text-red-500 text-[10px] font-black italic mt-2 uppercase tracking-tighter">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="spesialis" class="block text-[10px] font-black text-orange-600 uppercase tracking-widest ml-1 mb-2 italic">
                            Bidang Spesialisasi (Default)
                        </label>
                        <input type="text" name="spesialis" id="spesialis" 
                            class="w-full border-2 border-orange-100 rounded-2xl p-4 bg-gray-50 text-gray-400 font-bold shadow-inner cursor-not-allowed italic" 
                            value="Poli Gigi" readonly>
                        <p class="mt-2 text-[9px] text-gray-400 font-bold italic uppercase tracking-widest">
                            * Bidang saat ini terkunci pada sistem Poli Gigi
                        </p>
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-2xl shadow-xl shadow-orange-100 text-xs font-black uppercase tracking-[0.2em] transition-all active:scale-95 transform italic">
                            Simpan Data Dokter Baru →
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>