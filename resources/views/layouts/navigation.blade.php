<nav class="fixed left-0 top-0 h-screen bg-white border-r border-orange-100 transition-all duration-300 z-50 shadow-2xl overflow-y-auto overflow-x-hidden flex flex-col" 
     :class="open ? 'w-64' : 'w-20'">
    
    <div class="p-4 flex items-center justify-between border-b border-orange-50 bg-white sticky top-0 z-10 h-16">
        <div class="flex items-center gap-3 overflow-hidden flex-1" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-x-5">
            <a href="{{ route('dashboard') }}" class="shrink-0">
                <x-application-logo class="block h-9 w-auto fill-current text-orange-600" />
            </a>
            <span class="font-black text-orange-600 italic tracking-tighter text-lg whitespace-nowrap uppercase">Klinik Paoman</span>
        </div>

        <button @click="open = !open" class="p-2 rounded-xl hover:bg-orange-50 text-orange-500 transition-colors focus:outline-none ml-auto">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7M19 19l-7-7 7-7" />
            </svg>
        </button>
    </div>

    <div class="flex-1 px-2 py-4 space-y-2 overflow-y-auto custom-scrollbar">
        <a href="{{ route('dashboard') }}" 
           class="sidebar-link {{ request()->routeIs('dashboard') ? 'active-link' : '' }}" 
           :class="open ? 'justify-start px-3' : 'justify-center'">
            <div class="icon-box">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            </div>
            <span x-show="open" class="ml-4 font-bold text-xs uppercase italic tracking-widest whitespace-nowrap">Dashboard</span>
        </a>

        @if(Auth::user()->role === 'admin')
            <div x-show="open" class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] px-4 pt-4 pb-1 italic uppercase">Manajemen Sistem</div>
            
            <a href="{{ route('doctors.index') }}" class="sidebar-link {{ request()->routeIs('doctors.*') ? 'active-link' : '' }}" :class="open ? 'justify-start px-3' : 'justify-center'">
                <div class="icon-box">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <span x-show="open" class="ml-4 font-bold text-xs uppercase italic tracking-widest">Kelola Dokter</span>
            </a>

            <a href="{{ route('articles.index') }}" class="sidebar-link {{ request()->routeIs('articles.*') ? 'active-link' : '' }}" :class="open ? 'justify-start px-3' : 'justify-center'">
                <div class="icon-box">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V12M19 20a2 2 0 01-2-2m2-2h-4m-4 4V5"/></svg>
                </div>
                <span x-show="open" class="ml-4 font-bold text-xs uppercase italic tracking-widest">Kelola Artikel</span>
            </a>

            <a href="{{ route('patients.index') }}" class="sidebar-link {{ request()->routeIs('patients.*') ? 'active-link' : '' }}" :class="open ? 'justify-start px-3' : 'justify-center'">
                <div class="icon-box">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span x-show="open" class="ml-4 font-bold text-xs uppercase italic tracking-widest whitespace-nowrap">Data Pasien</span>
            </a>

            <a href="{{ route('reports.index') }}" class="sidebar-link {{ request()->routeIs('reports.*') ? 'active-link' : '' }}" :class="open ? 'justify-start px-3' : 'justify-center'">
                <div class="icon-box">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 2v-6m-8 10H4a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <span x-show="open" class="ml-4 font-bold text-xs uppercase italic tracking-widest">Laporan</span>
            </a>
        @endif

        @if(Auth::user()->role === 'pasien')
            <div x-show="open" class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] px-4 pt-4 pb-1 italic uppercase">Layanan Pasien</div>
            
            <a href="{{ route('pasien.registrations.create') }}" class="sidebar-link {{ request()->routeIs('pasien.registrations.create') ? 'active-link' : '' }}" :class="open ? 'justify-start px-3' : 'justify-center'">
                <div class="icon-box">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <span x-show="open" class="ml-4 font-bold text-xs uppercase italic tracking-widest">Daftar Poli</span>
            </a>

            <a href="{{ route('pasien.registrations.index') }}" class="sidebar-link {{ request()->routeIs('pasien.registrations.index') ? 'active-link' : '' }}" :class="open ? 'justify-start px-3' : 'justify-center'">
                <div class="icon-box">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <span x-show="open" class="ml-4 font-bold text-xs uppercase italic tracking-widest">Riwayat Kunjungan</span>
            </a>
        @endif

        <a href="{{ route('chat.index') }}" 
           class="sidebar-link {{ request()->routeIs('chat.*') ? 'active-link' : '' }}" 
           :class="open ? 'justify-start px-3' : 'justify-center'">
            <div class="icon-box">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            </div>
            <span x-show="open" class="ml-4 font-bold text-xs uppercase italic tracking-widest">Live Chat</span>
        </a>
    </div>

    <div class="p-2 border-t border-orange-50 bg-orange-50/30 space-y-1">
    <a href="{{ route('profile.edit') }}" 
       class="sidebar-link-small {{ request()->routeIs('profile.*') ? 'active-link' : '' }}" 
       :class="open ? 'px-3 justify-start' : 'justify-center'">
        <div class="icon-box-small shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
        </div>
        <span x-show="open" class="ml-3 font-bold text-[10px] uppercase italic truncate flex-1 tracking-tighter">
            {{ Auth::user()->name }}
        </span>
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="sidebar-link-small w-full text-red-500 hover:bg-red-50 border-none outline-none flex" :class="open ? 'px-3 justify-start' : 'justify-center'">
            <div class="icon-box-small shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
            </div>
            <span x-show="open" class="ml-3 font-black text-[10px] uppercase italic">Logout</span>
        </button>
    </form>
</div>
</nav>

<style>
    .sidebar-link {
        display: flex;
        align-items: center;
        border-radius: 1rem;
        color: #4b5563;
        transition: all 0.3s ease;
        text-decoration: none !important;
        height: 3.5rem;
    }
    /* Link Versi Ramping (Untuk Profil & Logout) */
    .sidebar-link-small {
        display: flex;
        align-items: center;
        border-radius: 0.75rem;
        color: #4b5563;
        transition: all 0.3s ease;
        text-decoration: none !important;
        height: 2.75rem; /* Tinggi dikurangi dari 3.5rem */
    }

    /* Kotak Ikon Versi Kecil */
    .icon-box-small {
        width: 2.25rem;  /* Lebih mungil */
        height: 2.25rem; /* Lebih mungil */
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.6rem;
        transition: all 0.3s ease;
    }

    .active-link .icon-box-small {
        background-color: #f97316 !important;
        color: white !important;
    }

    .active-link span { color: #f97316 !important; }
    .icon-box {
        width: 3rem;
        height: 3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.85rem;
        flex-shrink: 0;
    }
    .active-link .icon-box {
        background-color: #f97316 !important;
        color: white !important;
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.4);
    }
    .active-link span { color: #f97316 !important; }
    .sidebar-link:hover:not(.active-link) .icon-box { background-color: #fff7ed; color: #f97316; }
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #fed7aa; border-radius: 10px; }
</style>