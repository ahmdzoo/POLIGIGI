<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Poli Gigi Paoman') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            ::-webkit-scrollbar { width: 8px; }
            ::-webkit-scrollbar-track { background: #fff7ed; }
            ::-webkit-scrollbar-thumb { background: #fb923c; border-radius: 10px; }

            /* Transisi halus untuk pergeseran konten */
            .main-content-wrapper {
                transition: margin-left 0.3s ease-in-out;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-orange-50/20" x-data="{ open: true }">
        <div class="min-h-screen flex">
            
            @include('layouts.navigation')

            <div class="flex-1 flex flex-col main-content-wrapper" 
                 :class="open ? 'ml-64' : 'ml-20'">
                
                @isset($header)
                    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-40 border-b border-orange-100 shadow-sm">
                        <div class="max-w-7xl mx-auto py-4 px-6 sm:px-8 flex justify-between items-center">
                            <div class="flex items-center gap-4">
                                <div class="w-1.5 h-7 bg-orange-500 rounded-full"></div>
                                <div class="font-black text-gray-800 italic uppercase tracking-tighter">
                                    {{ $header }}
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="text-right hidden sm:block">
                                    <p class="text-[9px] font-black text-orange-500 uppercase leading-none tracking-widest italic">{{ Auth::user()->role }}</p>
                                    <p class="text-xs font-bold text-gray-700 italic leading-tight">{{ Auth::user()->name }}</p>
                                </div>
                                <div class="w-9 h-9 bg-orange-500 rounded-xl flex items-center justify-center text-white font-black shadow-lg shadow-orange-200">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            </div>
                        </div>
                    </header>
                @endisset

                <main class="flex-1 p-6 sm:p-10 relative">
                    <div class="absolute top-0 right-0 -z-10 opacity-5 pointer-events-none">
                        <svg width="400" height="400" fill="none" viewBox="0 0 400 400">
                            <circle cx="350" cy="50" r="150" fill="#f97316" />
                        </svg>
                    </div>
                    {{ $slot }}
                </main>

                <footer class="py-8 text-center text-[10px] text-gray-400 uppercase tracking-[0.2em] font-bold">
                    &copy; {{ date('Y') }} Klinik Paoman - Aplikasi Pendaftaran Online untuk meningkatkan efiensi pelayanan poli gigi di klinik paoman
                </footer>
            </div>
        </div>
    </body>
</html>