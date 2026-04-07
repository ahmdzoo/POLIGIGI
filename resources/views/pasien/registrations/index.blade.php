<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-orange-600 leading-tight italic uppercase tracking-tighter">
            {{ __('Riwayat Kunjungan Poli Gigi') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-orange-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-3xl border border-orange-100 p-8">
                
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
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
                                <th class="px-4 py-3">Nama Dokter</th> <th class="px-4 py-3 text-center">Layanan</th> <th class="px-4 py-3">Keluhan</th>
                                <th class="px-4 py-3 text-center">Tanggal Kunjungan</th>
                                <th class="px-4 py-3 text-center">Status</th>
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

                                <td class="px-4 py-5 text-center border-y border-gray-100 font-black text-gray-700 text-xs italic">
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
                                        <p class="text-sm font-bold text-gray-400 uppercase italic">Belum ada riwayat kunjungan</p>
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