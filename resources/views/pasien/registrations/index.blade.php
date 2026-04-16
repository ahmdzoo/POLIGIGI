<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-orange-600 leading-tight italic uppercase tracking-tighter">
            {{ __('Riwayat Kunjungan Poli Gigi') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-orange-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-3xl border border-orange-100 p-8">
                
                <div class="flex flex-col space-y-6 mb-8">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <h3 class="text-xl font-black text-gray-800 flex items-center gap-2 italic uppercase">
                                <span class="w-2 h-6 bg-orange-500 rounded-full"></span>
                                Daftar Antrean Anda
                            </h3>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1 italic">
                                Data riwayat pemeriksaan kesehatan gigi anda di Klinik Paoman
                            </p>
                        </div>
                        <a href="{{ route('pasien.registrations.create') }}" class="inline-flex items-center px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-black rounded-full transition-all shadow-lg shadow-orange-200 text-xs uppercase tracking-widest active:scale-95">
                            + Daftar Baru →
                        </a>
                    </div>

                    <form action="{{ route('pasien.registrations.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-orange-50/50 p-5 rounded-[2rem] border border-orange-100/50">
                        <div>
                            <select name="jenis_perawatan" class="w-full border-none bg-white rounded-xl px-4 py-2.5 text-[11px] font-bold italic shadow-sm focus:ring-2 focus:ring-orange-500 text-gray-600 uppercase tracking-tighter">
                                <option value="">Semua Layanan</option>
                                <option value="Check Up" {{ request('jenis_perawatan') == 'Check Up' ? 'selected' : '' }}>Check Up</option>
                                <option value="Scalling" {{ request('jenis_perawatan') == 'Scalling' ? 'selected' : '' }}>Scalling</option>
                                <option value="Tambal Gigi" {{ request('jenis_perawatan') == 'Tambal Gigi' ? 'selected' : '' }}>Tambal Gigi</option>
                                <option value="Cabut Gigi" {{ request('jenis_perawatan') == 'Cabut Gigi' ? 'selected' : '' }}>Cabut Gigi</option>
                                <option value="Perawatan Saluran Akar" {{ request('jenis_perawatan') == 'Perawatan Saluran Akar' ? 'selected' : '' }}>Perawatan Saluran Akar</option>
                                <option value="Pasang Behel" {{ request('jenis_perawatan') == 'Pasang Behel' ? 'selected' : '' }}>Pasang Behel</option>
                                <option value="Veneer Gigi" {{ request('jenis_perawatan') == 'Veneer Gigi' ? 'selected' : '' }}>Veneer Gigi</option>
                                <option value="Bleaching Gigi" {{ request('jenis_perawatan') == 'Bleaching Gigi' ? 'selected' : '' }}>Bleaching Gigi</option>
                                <option value="Implan Gigi" {{ request('jenis_perawatan') == 'Implan Gigi' ? 'selected' : '' }}>Implan Gigi</option>
                                <option value="Perawatan Gusi" {{ request('jenis_perawatan') == 'Perawatan Gusi' ? 'selected' : '' }}>Perawatan Gusi</option>
                            </select>
                        </div>

                        <div>
                            <input type="date" name="start_date" value="{{ request('start_date') }}" 
                                class="w-full border-none bg-white rounded-xl px-4 py-2.5 text-[11px] font-bold italic shadow-sm focus:ring-2 focus:ring-orange-500 text-gray-600">
                        </div>

                        <div>
                            <input type="date" name="end_date" value="{{ request('end_date') }}" 
                                class="w-full border-none bg-white rounded-xl px-4 py-2.5 text-[11px] font-bold italic shadow-sm focus:ring-2 focus:ring-orange-500 text-gray-600">
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="flex-1 bg-gray-800 hover:bg-black text-white px-4 py-2.5 rounded-xl font-black text-[10px] uppercase italic transition-all shadow-md active:scale-95">
                                Cari Riwayat
                            </button>
                            <a href="{{ route('pasien.registrations.index') }}" class="bg-orange-100 text-orange-600 px-3 py-2.5 rounded-xl hover:bg-orange-200 transition-all flex items-center justify-center shadow-sm" title="Reset Filter">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                            </a>
                        </div>
                    </form>
                </div>

                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-xl mb-6 shadow-sm flex items-center gap-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-[11px] font-black uppercase italic">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">
                                <th class="px-4 py-3 text-center">No.</th>
                                <th class="px-4 py-3">Nama Dokter</th> 
                                <th class="px-4 py-3 text-center">Layanan</th> 
                                <th class="px-4 py-3">Keluhan</th>
                                <th class="px-4 py-3 text-center">Tanggal Kunjungan</th>
                                <th class="px-4 py-3 text-center rounded-r-2xl">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse($registrations as $reg)
                            <tr class="bg-white hover:bg-orange-50/50 transition-all shadow-sm group">
                                <td class="px-4 py-5 text-center rounded-l-2xl border-y border-l border-gray-100">
                                    <span class="text-xl font-black text-orange-600 italic">#{{ $reg->no_antrean }}</span>
                                </td>

                                <td class="px-4 py-5 border-y border-gray-100">
                                    <div class="font-black text-gray-800 uppercase text-xs leading-tight">
                                        {{ $reg->schedule->doctor->nama_dokter }}
                                    </div>
                                </td>

                                <td class="px-4 py-5 text-center border-y border-gray-100">
                                    <div class="inline-block px-3 py-1 bg-orange-100 text-orange-600 rounded-lg text-[9px] font-black uppercase tracking-tighter italic border border-orange-200">
                                        {{ $reg->jenis_perawatan }}
                                    </div>
                                </td>

                                <td class="px-4 py-5 border-y border-gray-100">
                                    <p class="text-[11px] text-gray-500 italic font-medium leading-relaxed">
                                        "{{ Str::limit($reg->keluhan, 40) }}"
                                    </p>
                                </td>

                                <td class="px-4 py-5 text-center border-y border-gray-100 font-black text-gray-700 text-xs italic whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($reg->tgl_pendaftaran)->translatedFormat('d F Y') }}
                                </td>

                                <td class="px-4 py-5 text-center rounded-r-2xl border-y border-r border-gray-100">
                                    @if($reg->status == 'selesai')
                                        <span class="px-5 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest shadow-sm bg-green-100 text-green-600 border border-green-200">
                                            Selesai
                                        </span>
                                    @elseif($reg->status == 'menunggu')
                                        <span class="px-5 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest shadow-sm bg-amber-100 text-amber-600 border border-amber-200">
                                            Menunggu
                                        </span>
                                    @else
                                        <span class="px-5 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest shadow-sm bg-gray-100 text-gray-600 border border-gray-200">
                                            {{ $reg->status }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-20 text-center bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                        <p class="text-sm font-bold text-gray-400 uppercase italic">Data tidak ditemukan sesuai filter</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>