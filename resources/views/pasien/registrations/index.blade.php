<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Kunjungan Poli Gigi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-bold">Daftar Antrean Anda</h3>
                    <a href="{{ route('pasien.registrations.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-sm">
                        + Daftar Baru
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full text-left border-collapse">
    <thead>
        <tr class="bg-gray-100 text-sm">
            <th class="border p-2 text-center">No. Antrean</th>
            <th class="border p-2">Dokter & Jadwal</th>
            <th class="border p-2">Jenis Perawatan</th> <th class="border p-2">Keluhan</th>
            <th class="border p-2 text-center">Jam Estimasi</th>
            <th class="border p-2 text-center">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($registrations as $reg)
        <tr class="text-sm">
            <td class="border p-2 text-center font-bold text-lg text-blue-600">{{ $reg->no_antrean }}</td>
            <td class="border p-2">
                <b>{{ $reg->schedule->doctor->nama_dokter }}</b><br>
                <span class="text-xs text-gray-500">{{ $reg->tgl_pendaftaran }}</span>
            </td>
            <td class="border p-2">
                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">
                    {{ $reg->jenis_perawatan }}
                </span>
            </td>
            <td class="border p-2 text-gray-600 italic">{{ Str::limit($reg->keluhan, 50) }}</td>
            <td class="border p-2 text-center font-medium">{{ $reg->estimasi_jam }} WIB</td>
            <td class="border p-2 text-center">
                <span class="px-2 py-1 rounded text-[10px] font-bold uppercase {{ $reg->status == 'menunggu' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                    {{ $reg->status }}
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>
    </div>
</x-app-layout>