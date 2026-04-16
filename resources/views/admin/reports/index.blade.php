<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-orange-600 leading-tight italic uppercase tracking-tighter">
            {{ __('Analisis & Laporan Kunjungan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-orange-50/20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-to-br from-orange-500 to-orange-600 p-6 rounded-[2rem] shadow-xl shadow-orange-100">
                    <p class="text-[10px] font-black text-orange-100 uppercase tracking-widest mb-1 italic">Total Kunjungan</p>
                    <h3 class="text-3xl font-black text-white italic">{{ $registrations->count() }} <span class="text-xs uppercase font-bold">Pasien</span></h3>
                </div>
                
                <div class="bg-white p-6 rounded-[2rem] shadow-xl border border-orange-100">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 italic">Update Terakhir</p>
                    <h3 class="text-2xl font-black text-orange-600 italic">
                        {{ $registrations->max('created_at') ? $registrations->max('created_at')->format('H:i') : '--:--' }} 
                        <span class="text-xs text-gray-400 uppercase font-bold text-gray-300">WIB</span>
                    </h3>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-xl border border-orange-100">
                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 italic">Layanan Terpopuler</p>
                    <h3 class="text-xl font-black text-gray-800 italic uppercase truncate">
                        {{ $registrations->groupBy('jenis_perawatan')->map->count()->sortDesc()->keys()->first() ?? 'N/A' }}
                    </h3>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[2.5rem] shadow-2xl border border-orange-100 mb-8">
                <form action="{{ route('reports.index') }}" method="GET">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label class="block text-[10px] font-black text-orange-500 uppercase tracking-[0.2em] mb-3 ml-1 italic">Rentang Awal</label>
                            <input type="date" name="start_date" value="{{ request('start_date') }}" class="w-full border-2 border-orange-50 rounded-2xl p-4 text-xs font-bold text-gray-700 bg-orange-50/30 focus:border-orange-500 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-orange-500 uppercase tracking-[0.2em] mb-3 ml-1 italic">Rentang Akhir</label>
                            <input type="date" name="end_date" value="{{ request('end_date') }}" class="w-full border-2 border-orange-50 rounded-2xl p-4 text-xs font-bold text-gray-700 bg-orange-50/30 focus:border-orange-500 focus:ring-0">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-orange-500 uppercase tracking-[0.2em] mb-3 ml-1 italic">Jenis Perawatan</label>
                            <select name="jenis_perawatan" class="w-full border-2 border-orange-50 rounded-2xl p-4 text-xs font-bold text-gray-700 bg-orange-50/30 focus:border-orange-500 focus:ring-0 italic appearance-none">
                                <option value="">Semua Layanan</option>
                                <option value="Cabut Gigi" {{ request('jenis_perawatan') == 'Cabut Gigi' ? 'selected' : '' }}>Cabut Gigi</option>
                                <option value="Scaling" {{ request('jenis_perawatan') == 'Scaling' ? 'selected' : '' }}>Scaling</option>
                                <option value="Tambal Gigi" {{ request('jenis_perawatan') == 'Tambal Gigi' ? 'selected' : '' }}>Tambal Gigi</option>
                                <option value="Check Up" {{ request('jenis_perawatan') == 'Check Up' ? 'selected' : '' }}>Check Up</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4">
                        <button type="submit" class="flex-1 inline-flex items-center justify-center px-8 py-4 bg-gray-900 hover:bg-black text-white text-[11px] font-black rounded-2xl transition-all shadow-xl shadow-gray-200 uppercase tracking-widest active:scale-95 italic">
                            Terapkan Filter Data
                        </button>
                        
                        <a href="{{ route('reports.pdf', request()->query()) }}" class="flex-1 inline-flex items-center justify-center px-8 py-4 bg-red-600 hover:bg-red-700 text-white text-[11px] font-black rounded-2xl transition-all shadow-xl shadow-red-100 uppercase tracking-widest active:scale-95 italic">
                            Export PDF Laporan
                        </a>

                        <a href="{{ route('reports.index') }}" class="md:w-16 flex items-center justify-center p-4 bg-orange-100 text-orange-600 rounded-2xl hover:bg-orange-200 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                        </a>
                    </div>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-[2.5rem] border border-orange-100 p-8">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="text-orange-800 text-[10px] font-black uppercase tracking-widest italic opacity-60">
                                <th class="px-4 py-3">Data Pasien</th>
                                <th class="px-4 py-3">Detail Kunjungan</th>
                                <th class="px-4 py-3">Layanan Medis</th>
                                <th class="px-4 py-3 text-center">No. Antrean</th>
                                <th class="px-4 py-3 text-center rounded-r-2xl">Kontrol Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($registrations as $reg)
                            <tr class="bg-white hover:bg-orange-50/50 transition-all shadow-sm group">
                                <td class="px-4 py-5 border-y border-l rounded-l-2xl border-gray-100">
                                    <div class="font-black text-gray-800 uppercase leading-tight group-hover:text-orange-600 transition-colors">{{ $reg->user->name }}</div>
                                    <div class="text-[9px] text-gray-400 font-bold mt-1 tracking-tighter uppercase">NIK: {{ $reg->user->nik }}</div>
                                    <div class="text-[9px] text-orange-500 font-black italic mt-0.5 tracking-tight bg-orange-50 inline-block px-2 rounded-full">WA: {{ $reg->no_hp }}</div>
                                </td>

                                <td class="px-4 py-5 border-y border-gray-100">
                                    <div class="font-bold text-gray-700 text-[11px] uppercase tracking-tighter">{{ $reg->schedule->doctor->nama_dokter }}</div>
                                    <div class="text-[10px] text-gray-400 italic font-bold mt-1 uppercase">{{ \Carbon\Carbon::parse($reg->tgl_pendaftaran)->translatedFormat('d F Y') }}</div>
                                </td>

                                <td class="px-4 py-5 border-y border-gray-100">
                                    <span class="inline-block px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-[9px] font-black mb-2 uppercase tracking-tighter border border-orange-200 italic shadow-sm">
                                        {{ $reg->jenis_perawatan }}
                                    </span>
                                    <div class="text-[10px] text-gray-400 italic leading-tight font-medium opacity-80">"{{ Str::limit($reg->keluhan, 45) }}"</div>
                                </td>

                                <td class="px-4 py-5 border-y text-center border-gray-100">
                                    <div class="text-2xl font-black text-orange-600 italic">#{{ $reg->no_antrean }}</div>
                                    <div class="text-[9px] font-black text-gray-400 mt-1 uppercase italic bg-gray-50 px-3 py-0.5 rounded-full inline-block border border-gray-100">{{ $reg->estimasi_jam }}</div>
                                </td>

                                <td class="px-4 py-5 border-y border-r rounded-r-2xl text-center border-gray-100">
                                    <form action="{{ route('registrations.updateStatus', $reg->id) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" 
                                            class="text-[9px] font-black rounded-full border border-gray-200 py-2 px-4 shadow-sm cursor-pointer focus:ring-orange-500 transition-all uppercase tracking-widest
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
                            @empty
                            <tr>
                                <td colspan="5" class="p-20 text-center bg-gray-50 rounded-[2rem] border-2 border-dashed border-gray-200 font-black text-gray-400 uppercase italic">Data tidak ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>