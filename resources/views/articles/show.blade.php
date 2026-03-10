<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2">
            <a href="{{ route('dashboard') }}" class="text-orange-500 hover:text-orange-700 font-bold">← Kembali</a>
            <h2 class="font-black text-xl text-gray-800 leading-tight italic ml-4">
                Detail Edukasi Kesehatan
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-orange-50/20">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl rounded-3xl border border-orange-100">
                @if($article->image)
                    <div class="w-full h-80 overflow-hidden">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->judul }}" class="w-full h-full object-cover">
                    </div>
                @endif

                <div class="p-10">
                    <div class="mb-6">
                        <span class="bg-orange-100 text-orange-600 text-[10px] font-black px-4 py-1 rounded-full uppercase tracking-widest">
                            Info Kesehatan Gigi
                        </span>
                        <h1 class="text-3xl font-black text-gray-900 mt-4 leading-tight italic uppercase tracking-tighter">
                            {{ $article->judul }}
                        </h1>
                        <p class="text-[10px] text-gray-400 mt-2 font-bold uppercase">
                            Diterbitkan pada: {{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('d F Y') }}
                        </p>
                    </div>

                    <div class="prose prose-orange max-w-none text-gray-700 leading-relaxed italic font-medium">
                        {!! nl2br(e($article->konten)) !!}
                    </div>

                    <div class="mt-12 pt-8 border-t border-orange-100 flex justify-between items-center">
                        <p class="text-xs text-gray-400 italic">Semoga informasi ini bermanfaat bagi Anda!</p>
                        <a href="{{ route('pasien.registrations.create') }}" class="bg-orange-500 text-white px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg shadow-orange-200">
                            Daftar Praktek Sekarang →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>