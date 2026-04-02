<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-orange-600 leading-tight italic">
            {{ __('Halo, ') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="mb-12">
    <div class="relative overflow-hidden bg-gradient-to-br from-orange-500 to-orange-600 rounded-[2rem] p-8 shadow-2xl shadow-orange-200 group">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-700"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-black/5 rounded-full blur-2xl"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center border border-white/30 shadow-inner">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-black text-white italic uppercase tracking-tighter leading-none">Jam Operasional</h3>
                    <p class="text-orange-100 text-[10px] font-bold uppercase tracking-[0.2em] mt-2 italic">Klinik Gigi Paoman, Indramayu</p>
                </div>
            </div>

            <div class="flex flex-wrap justify-center gap-3">
                <div class="bg-white/15 backdrop-blur-sm border border-white/20 px-5 py-3 rounded-2xl text-center min-w-[140px]">
                    <p class="text-[9px] font-black text-orange-100 uppercase tracking-widest mb-1">Senin - Sabtu</p>
                    <p class="text-lg font-black text-white tracking-tighter italic">16:00 - 21:00</p>
                    <p class="text-[8px] text-orange-200 font-bold uppercase mt-1 italic">WIB</p>
                </div>

                <div class="bg-red-500/20 backdrop-blur-sm border border-red-400/30 px-5 py-3 rounded-2xl text-center min-w-[140px]">
                    <p class="text-[9px] font-black text-red-200 uppercase tracking-widest mb-1">Minggu / Libur</p>
                    <p class="text-lg font-black text-white tracking-tighter italic italic">TUTUP</p>
                    <p class="text-[8px] text-red-200 font-bold uppercase mt-1 italic italic">Emergency Only</p>
                </div>
            </div>
        </div>
    </div>
</div>
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

            @if(Auth::user()->favoriteArticles->count() > 0)
<div class="mb-12">
    <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2 italic">
        <span class="w-2 h-6 bg-orange-500 rounded-full"></span>
        Edukasi Favorit Saya
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach(Auth::user()->favoriteArticles as $fav)
        <div class="bg-white p-4 rounded-3xl shadow-sm border border-orange-100 flex items-center gap-4 hover:shadow-md transition-all group">
            <div class="w-16 h-16 rounded-2xl overflow-hidden shrink-0">
                <img src="{{ asset('storage/' . $fav->image) }}" class="w-full h-full object-cover">
            </div>
            <div class="flex-1">
                <h4 class="font-black text-gray-800 text-[11px] uppercase leading-tight group-hover:text-orange-600">{{ Str::limit($fav->judul, 30) }}</h4>
                <a href="{{ route('articles.show', $fav->id) }}" class="text-[10px] text-orange-500 font-bold italic">Baca Lagi →</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

            <div>
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-2 h-6 bg-orange-500 rounded-full"></span>
                        Edukasi Kesehatan Gigi
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach(\App\Models\Article::latest()->take(6)->get() as $article)
    <div class="bg-white rounded-3xl shadow-sm overflow-hidden group hover:shadow-xl transition-all duration-300 border border-orange-50 relative">
        
        <div class="h-48 overflow-hidden relative">
            <form action="{{ route('articles.favorite', $article->id) }}" method="POST" class="absolute top-4 right-4 z-20">
                @csrf
                <button type="submit" class="w-9 h-9 rounded-full flex items-center justify-center backdrop-blur-md shadow-lg transition-all transform active:scale-90 {{ Auth::user()->favoriteArticles->contains($article->id) ? 'bg-orange-500 text-white' : 'bg-white/70 text-gray-400 hover:text-orange-500 hover:bg-white' }}">
                    <svg class="w-5 h-5" fill="{{ Auth::user()->favoriteArticles->contains($article->id) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </button>
            </form>

            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
            @else
                <div class="w-full h-full bg-orange-100 flex items-center justify-center">
                    <svg class="w-12 h-12 text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
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
            <p class="text-xs text-gray-500 leading-relaxed mb-4 line-clamp-3">
                {{ Str::limit(strip_tags($article->konten), 80) }}
            </p>
            <div class="flex items-center justify-between mt-auto pt-2 border-t border-gray-50">
                <a href="{{ route('articles.show', $article->id) }}" class="text-orange-500 font-bold text-xs flex items-center gap-1 hover:gap-2 transition-all italic uppercase tracking-wider">
                    Baca Selengkapnya <span>→</span>
                </a>
                <span class="text-[9px] text-gray-400 font-bold uppercase">{{ $article->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>
            </div>

        </div>
    </div>
</x-app-layout>