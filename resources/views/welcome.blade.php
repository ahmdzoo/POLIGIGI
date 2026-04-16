<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klinik Gigi Paoman - Solusi Senyum Sehat Indramayu</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white font-['Figtree'] selection:bg-orange-500 selection:text-white">

    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-orange-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-2">
                    <x-application-logo class="w-10 h-10 fill-current text-orange-600" />
                    <span class="font-black text-xl italic uppercase tracking-tighter text-gray-800">
                        KLINIK<span class="text-orange-600">PAOMAN</span>
                    </span>
                </div>
                
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-[11px] font-black uppercase italic text-orange-600 border-2 border-orange-500 px-6 py-2 rounded-full hover:bg-orange-500 hover:text-white transition-all shadow-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-[11px] font-black uppercase italic text-gray-500 hover:text-orange-600 transition-colors">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-orange-500 text-white text-[11px] font-black uppercase italic px-6 py-3 rounded-full shadow-lg shadow-orange-200 hover:bg-orange-600 transition-all active:scale-95">Daftar Akun </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute top-0 right-0 -z-10 w-1/2 h-full bg-orange-50/50 rounded-bl-[10rem]"></div>
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block px-4 py-1.5 bg-orange-100 text-orange-600 text-[10px] font-black uppercase tracking-widest rounded-full mb-6 italic border border-orange-200">
                    📍 Lokasi: Paoman, Indramayu
                </span>
                <h1 class="text-6xl lg:text-7xl font-black text-gray-800 leading-[0.9] italic uppercase tracking-tighter mb-6">
                    Senyum Sehat<br><span class="text-orange-500 underline decoration-4 underline-offset-8">Mulai Dari Sini.</span>
                </h1>
                <p class="text-gray-500 font-medium text-lg max-w-md leading-relaxed mb-10 italic">
                    Pelayanan kesehatan gigi profesional dengan teknologi modern untuk warga Indramayu. Booking antrean jadi lebih mudah dan cepat.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('register') }}" class="px-8 py-4 bg-orange-500 text-white font-black rounded-2xl shadow-2xl shadow-orange-200 hover:bg-orange-600 transition-all flex items-center gap-3 group italic text-sm tracking-widest uppercase">
                        Reservasi Online Sekarang 
                        <span class="group-hover:translate-x-1 transition-transform"></span>
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="relative z-10 rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white group">
                    <img src="{{ asset('images/paomanklinik.jpg') }}" class="w-full h-[500px] object-cover group-hover:scale-105 transition-transform duration-1000" alt="Klinik Gigi Paoman">
                </div>
                <div class="absolute -bottom-6 -left-6 z-20 bg-white p-6 rounded-3xl shadow-2xl border border-orange-50 max-w-[200px] animate-bounce">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse shadow-[0_0_10px_rgba(34,197,94,0.5)]"></div>
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-tighter">Antrean Digital</span>
                    </div>
                    <p class="text-[11px] font-bold text-gray-800 italic uppercase leading-tight">Skip antrian manual. Ambil antrian dan periksa antrian dari mana saja.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-50/30 relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center mb-16">
            <h2 class="text-4xl font-black text-gray-800 italic uppercase tracking-tighter">Layanan Kesehatan Gigi</h2>
            <div class="w-20 h-1.5 bg-orange-500 mx-auto mt-4 rounded-full"></div>
            <p class="text-[10px] text-gray-400 font-black uppercase tracking-[0.3em] mt-4 italic">Solusi menyeluruh untuk kesehatan dan estetika gigi anda</p>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $all_services = [
                    ['name' => 'Check Up', 'icon' => '🩺', 'desc' => 'Pemeriksaan rutin untuk mendeteksi masalah gigi sejak dini.'],
                    ['name' => 'Scalling', 'icon' => '✨', 'desc' => 'Pembersihan karang gigi untuk mencegah radang gusi.'],
                    ['name' => 'Tambal Gigi', 'icon' => '🦷', 'desc' => 'Menutup lubang pada gigi dengan bahan sewarna asli.'],
                    ['name' => 'Cabut Gigi', 'icon' => '🛡️', 'desc' => 'Tindakan pencabutan gigi yang sudah tidak bisa dipertahankan.'],
                    ['name' => 'Saluran Akar', 'icon' => '🔬', 'desc' => 'Perawatan untuk menyelamatkan gigi yang sudah mati/infeksi.'],
                    ['name' => 'Pasang Behel', 'icon' => '⛓️', 'desc' => 'Merapikan posisi gigi agar fungsi kunyah & estetika maksimal.'],
                    ['name' => 'Veneer Gigi', 'icon' => '💎', 'desc' => 'Lapisan tipis untuk memperbaiki bentuk dan warna gigi.'],
                    ['name' => 'Bleaching Gigi', 'icon' => '⚡', 'desc' => 'Prosedur pemutihan gigi untuk senyum yang lebih cerah.'],
                    ['name' => 'Implan Gigi', 'icon' => '🏗️', 'desc' => 'Penggantian akar gigi yang hilang dengan sekrup titanium.'],
                ];
            @endphp

            @foreach($all_services as $service)
            <div class="bg-white p-8 rounded-[2.5rem] border border-orange-50 hover:border-orange-500 hover:shadow-2xl transition-all group relative overflow-hidden">
                <div class="absolute -right-4 -bottom-4 text-6xl opacity-5 group-hover:scale-110 transition-transform">{{ $service['icon'] }}</div>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-orange-50 rounded-2xl flex items-center justify-center text-2xl group-hover:bg-orange-500 group-hover:text-white transition-colors">
                        {{ $service['icon'] }}
                    </div>
                    <h3 class="text-sm font-black text-gray-800 uppercase italic tracking-tighter">{{ $service['name'] }}</h3>
                </div>
                <p class="text-xs text-gray-500 font-medium leading-relaxed italic">{{ $service['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <footer class="bg-white border-t border-orange-50 py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-12 mb-12">
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <x-application-logo class="w-8 h-8 fill-current text-orange-600" />
                        <span class="font-black text-lg italic uppercase tracking-tighter text-gray-800">KlinikPaoman</span>
                    </div>
                    <p class="text-gray-400 text-xs font-medium leading-relaxed uppercase italic">
                        Klinik kesehatan gigi terpercaya di Indramayu dengan sistem antrean digital modern.
                    </p>
                </div>
                <div>
                    <h4 class="font-black text-[10px] uppercase tracking-widest text-orange-600 mb-4 italic">Kontak Kami</h4>
                    <p class="text-gray-800 font-black text-sm italic uppercase">0812-3456-7890</p>
                    <p class="text-gray-400 text-xs mt-1 font-bold italic uppercase">admin@paomandental.com</p>
                </div>
                <div>
                    <h4 class="font-black text-[10px] uppercase tracking-widest text-orange-600 mb-4 italic">Media Sosial</h4>
                    <div class="flex gap-4">
                        <a href="#" class="text-gray-800 font-black text-[10px] uppercase italic hover:text-orange-500">Instagram</a>
                        <a href="#" class="text-gray-800 font-black text-[10px] uppercase italic hover:text-orange-500">Facebook</a>
                    </div>
                </div>
            </div>
            <div class="pt-8 border-t border-orange-50 text-center">
                <p class="text-gray-400 text-[9px] font-black uppercase tracking-widest italic">
                    © {{ date('Y') }} Klinik Gigi Paoman. Dikelola oleh Hadi Haris Kiyandi.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>