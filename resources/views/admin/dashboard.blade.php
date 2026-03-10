<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-orange-600 leading-tight flex items-center gap-3">
            <div class="p-2 bg-orange-500 rounded-xl shadow-lg shadow-orange-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            {{ __('Dashboard Utama Klinik Paoman') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-orange-50/30">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                <div class="bg-white p-6 rounded-3xl shadow-sm border-b-8 border-orange-500 hover:translate-y-[-5px] transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="text-xs text-gray-400 uppercase font-black tracking-widest">Total Dokter</div>
                        <div class="p-2 bg-orange-100 rounded-lg text-orange-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
                        </div>
                    </div>
                    <div class="text-3xl font-black text-gray-800 mt-2">{{ \App\Models\Doctor::count() }}</div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border-b-8 border-orange-400 hover:translate-y-[-5px] transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="text-xs text-gray-400 uppercase font-black tracking-widest">Database Pasien</div>
                        <div class="p-2 bg-orange-50 rounded-lg text-orange-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                        </div>
                    </div>
                    <div class="text-3xl font-black text-gray-800 mt-2">{{ \App\Models\User::where('role', 'pasien')->count() }}</div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border-b-8 border-orange-300 hover:translate-y-[-5px] transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="text-xs text-orange-500 uppercase font-black tracking-widest">Antrean Hari Ini</div>
                        <div class="p-2 bg-orange-100 rounded-lg text-orange-600 animate-pulse">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <div class="text-3xl font-black text-gray-800 mt-2">{{ \App\Models\Registration::whereDate('tgl_pendaftaran', today())->count() }}</div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border-b-8 border-orange-200 hover:translate-y-[-5px] transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div class="text-xs text-gray-400 uppercase font-black tracking-widest">Artikel Edukasi</div>
                        <div class="p-2 bg-gray-50 rounded-lg text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                        </div>
                    </div>
                    <div class="text-3xl font-black text-gray-800 mt-2">{{ \App\Models\Article::count() }}</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-orange-100">
                <div class="p-8 border-b border-orange-50 bg-white">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-black text-xl text-gray-800 tracking-tight italic">Monitoring Antrean Pasien</h3>
                            <p class="text-xs text-orange-400 mt-1 font-bold italic underline">Update otomatis saat status diubah</p>
                        </div>
                        <div class="hidden md:block">
                            <span class="px-4 py-2 bg-orange-50 text-orange-600 rounded-full text-xs font-bold">
                                {{ date('d M Y') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="p-0">
                    @if(\App\Models\Registration::count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="bg-orange-50/50 text-orange-800 uppercase text-[10px] font-black tracking-widest">
                                    <th class="p-4">Identitas Pasien</th>
                                    <th class="p-4">Jadwal & Dokter</th>
                                    <th class="p-4">Layanan & Keluhan</th>
                                    <th class="p-4 text-center">Nomor & Estimasi</th>
                                    <th class="p-4 text-center">Kontrol Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-orange-50">
                                @foreach(\App\Models\Registration::with(['user', 'schedule.doctor'])->latest()->take(10)->get() as $reg)
                                <tr class="hover:bg-orange-50/30 transition duration-150">
                                    <td class="p-4">
                                        <div class="font-black text-gray-900 uppercase">{{ $reg->user->name }}</div>
                                        <div class="text-[10px] text-gray-400 mt-0.5 font-bold">NIK: {{ $reg->user->nik }}</div>
                                        <div class="text-[10px] text-orange-500 font-bold italic">WA: {{ $reg->no_hp }}</div>
                                    </td>

                                    <td class="p-4">
                                        <div class="font-bold text-gray-700">{{ $reg->schedule->doctor->nama_dokter }}</div>
                                        <div class="text-[10px] text-gray-400 italic">{{ \Carbon\Carbon::parse($reg->tgl_pendaftaran)->translatedFormat('d F Y') }}</div>
                                    </td>

                                    <td class="p-4">
                                        <span class="inline-block px-2 py-0.5 bg-orange-100 text-orange-700 rounded text-[9px] font-black mb-1 uppercase tracking-tighter">
                                            {{ $reg->jenis_perawatan }}
                                        </span>
                                        <div class="text-[11px] text-gray-500 leading-tight italic font-medium">
                                            "{{ Str::limit($reg->keluhan, 45) }}"
                                        </div>
                                    </td>

                                    <td class="p-4 text-center">
                                        <div class="text-2xl font-black text-orange-600">#{{ $reg->no_antrean }}</div>
                                        <div class="text-[9px] font-black text-gray-400 bg-gray-50 rounded px-2 py-0.5 inline-block">{{ $reg->estimasi_jam }} WIB</div>
                                    </td>

                                    <td class="p-4 text-center">
                                        <form action="{{ route('registrations.updateStatus', $reg->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" 
                                                class="text-[10px] font-black rounded-full border-none py-1.5 px-3 focus:ring-orange-500 cursor-pointer shadow-sm
                                                {{ $reg->status == 'menunggu' ? 'bg-orange-100 text-orange-700' : '' }}
                                                {{ $reg->status == 'selesai' ? 'bg-green-100 text-green-700' : '' }}
                                                {{ $reg->status == 'batal' ? 'bg-red-100 text-red-700' : '' }}">
                                                <option value="menunggu" {{ $reg->status == 'menunggu' ? 'selected' : '' }}>MENUNGGU</option>
                                                <option value="selesai" {{ $reg->status == 'selesai' ? 'selected' : '' }}>SELESAI</option>
                                                <option value="batal" {{ $reg->status == 'batal' ? 'selected' : '' }}>BATAL</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-20">
                        <div class="inline-block p-6 bg-orange-50 rounded-full mb-4">
                            <svg class="w-16 h-16 text-orange-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 italic">Belum ada pendaftaran hari ini</h4>
                        <p class="text-gray-400 text-xs">Data pendaftaran terbaru dari pasien akan muncul secara otomatis di sini.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>