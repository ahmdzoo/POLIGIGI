<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-orange-600 leading-tight italic">
            {{ __('Halo, ') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-orange-50/30">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-12">
                <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span class="w-2 h-6 bg-orange-500 rounded-full"></span>
                    Antrean Saya Hari Ini
                </h3>
                
                @php
    $myReg = \App\Models\Registration::where('user_id', Auth::id())
        ->whereDate('tgl_pendaftaran', now()->toDateString()) // Lebih presisi daripada today()
        ->whereIn('status', ['menunggu', 'proses']) // Pastikan statusnya bukan 'batal' atau 'selesai'
        ->first();
@endphp

                @if($myReg)
                <div class="bg-white overflow-hidden shadow-xl rounded-3xl border-2 border-orange-100 flex flex-col md:flex-row transition-all hover:shadow-orange-100/50 hover:shadow-2xl">
    <div class="bg-orange-500 p-8 text-white flex flex-col justify-center items-center md:w-1/3 text-center border-b-4 md:border-b-0 md:border-r-4 border-orange-600/20">
        <div class="text-[10px] font-black uppercase tracking-[0.2em] opacity-80 mb-1">Nomor Antrean</div>
        <div class="text-7xl font-black my-2 drop-shadow-lg">#{{ $myReg->no_antrean }}</div>
        <div class="mt-2 px-5 py-1.5 bg-white/20 backdrop-blur-sm rounded-full text-[10px] font-black uppercase tracking-widest border border-white/30">
            {{ $myReg->status }}
        </div>
    </div>

    <div class="p-8 flex-1 relative bg-gradient-to-br from-white to-orange-50/30">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
            <div class="space-y-1">
                <div class="text-[10px] text-gray-400 font-black uppercase tracking-widest flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-orange-400 rounded-full"></span>
                    Estimasi Jam
                </div>
                <div class="text-xl font-black text-orange-600 italic tracking-tighter">{{ $myReg->estimasi_jam }} WIB</div>
            </div>

            <div class="space-y-1">
                <div class="text-[10px] text-gray-400 font-black uppercase tracking-widest flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-orange-400 rounded-full"></span>
                    Dokter Spesialis
                </div>
                <div class="text-sm font-black text-gray-700 uppercase leading-tight">{{ $myReg->schedule->doctor->nama_dokter }}</div>
            </div>

            <div class="space-y-1">
                <div class="text-[10px] text-gray-400 font-black uppercase tracking-widest flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-orange-400 rounded-full"></span>
                    Jenis Layanan
                </div>
                <div class="inline-flex px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-[10px] font-black uppercase border border-orange-200 shadow-sm">
                    {{ $myReg->jenis_perawatan }}
                </div>
            </div>

            <div class="space-y-1">
                <div class="text-[10px] text-gray-400 font-black uppercase tracking-widest flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-orange-400 rounded-full"></span>
                    Keluhan Utama
                </div>
                <div class="text-[11px] text-gray-500 italic font-medium leading-relaxed bg-gray-50 p-2 rounded-lg border border-gray-100">
                    "{{ Str::limit($myReg->keluhan, 50) }}"
                </div>
            </div>
        </div>

        <div class="absolute -right-4 -bottom-4 opacity-5 pointer-events-none">
            <svg width="120" height="120" fill="none" viewBox="0 0 24 24" stroke="#f97316" stroke-width="1">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
            </svg>
        </div>
    </div>
</div>
                @else
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-dashed border-orange-300 text-center">
                    <p class="text-gray-500 italic text-sm mb-4 font-medium">Anda belum memiliki antrean aktif untuk hari ini.</p>
                    <a href="{{ route('pasien.registrations.create') }}" class="inline-flex items-center px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-black rounded-full transition-all shadow-lg shadow-orange-200 text-xs uppercase tracking-widest">
                        Daftar Praktek Sekarang →
                    </a>
                </div>
                @endif
            </div>

            <div>
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-2 h-6 bg-orange-500 rounded-full"></span>
                        Edukasi Kesehatan Gigi
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach(\App\Models\Article::latest()->take(6)->get() as $article)
                    <div class="bg-white rounded-3xl shadow-sm overflow-hidden group hover:shadow-xl transition-all duration-300 border border-orange-50">
                        <div class="h-48 overflow-hidden relative">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-orange-100 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="bg-orange-500 text-white text-[9px] font-black px-3 py-1 rounded-full uppercase shadow-lg">Info Gigi</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="font-black text-gray-800 text-lg mb-2 leading-tight group-hover:text-orange-600 transition-colors">
                                {{ $article->judul }}
                            </h4>
                            <p class="text-xs text-gray-500 leading-relaxed mb-4">
                                {{ Str::limit(strip_tags($article->konten), 80) }}
                            </p>
                            <a href="{{ route('articles.show', $article->id) }}" class="text-orange-500 font-bold text-xs flex items-center gap-1 hover:gap-2 transition-all italic">
    Baca Selengkapnya <span>→</span>
</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>