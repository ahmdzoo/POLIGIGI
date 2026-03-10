<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-black text-2xl text-orange-600 leading-tight italic uppercase tracking-tighter">
                {{ __('Laporan Detail Pendaftaran Pasien') }}
            </h2>
            <a href="{{ route('reports.pdf') }}" class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white text-xs font-black rounded-full transition-all shadow-lg shadow-red-100 uppercase tracking-widest">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Export PDF
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-orange-50/20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-orange-100 p-8">
                
                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-xl flex items-center shadow-sm">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="font-bold italic">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="bg-orange-50 text-orange-800 text-[10px] font-black uppercase tracking-widest italic">
                                <th class="p-4 rounded-l-2xl">Data Pasien</th>
                                <th class="p-4">Kunjungan</th>
                                <th class="p-4">Keluhan & Perawatan</th>
                                <th class="p-4 text-center">Antrean</th>
                                <th class="p-4 text-center rounded-r-2xl">Kontrol Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registrations as $reg)
                            <tr class="bg-white hover:bg-orange-50/50 transition-all shadow-sm">
                                <td class="p-4 border-y border-l rounded-l-2xl">
                                    <div class="font-black text-gray-800 uppercase leading-tight">{{ $reg->user->name }}</div>
                                    <div class="text-[9px] text-gray-400 font-bold mt-1">NIK: {{ $reg->user->nik }}</div>
                                    <div class="text-[9px] text-orange-500 font-black italic">WA: {{ $reg->no_hp }}</div>
                                </td>

                                <td class="p-4 border-y">
                                    <div class="font-bold text-gray-700 text-xs">{{ $reg->schedule->doctor->nama_dokter }}</div>
                                    <div class="text-[10px] text-gray-400 italic font-medium">{{ \Carbon\Carbon::parse($reg->tgl_pendaftaran)->translatedFormat('d F Y') }}</div>
                                </td>

                                <td class="p-4 border-y">
                                    <span class="inline-block px-2 py-0.5 bg-orange-100 text-orange-700 rounded text-[9px] font-black mb-1 uppercase tracking-tighter shadow-sm">
                                        {{ $reg->jenis_perawatan }}
                                    </span>
                                    <div class="text-[10px] text-gray-500 italic leading-tight font-medium">"{{ Str::limit($reg->keluhan, 60) }}"</div>
                                </td>

                                <td class="p-4 border-y text-center">
                                    <div class="text-xl font-black text-orange-600 leading-none">#{{ $reg->no_antrean }}</div>
                                    <div class="text-[9px] font-black text-gray-400 mt-1 uppercase bg-gray-50 px-2 py-0.5 rounded inline-block">{{ $reg->estimasi_jam }}</div>
                                </td>

                                <td class="p-4 border-y border-r rounded-r-2xl text-center">
                                    <form action="{{ route('registrations.updateStatus', $reg->id) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" 
                                            class="text-[9px] font-black rounded-full border-none py-1.5 px-4 shadow-sm cursor-pointer focus:ring-orange-500
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
            </div>
        </div>
    </div>
</x-app-layout>