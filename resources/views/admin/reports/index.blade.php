<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Laporan Detail Pendaftaran Pasien</h2>
            <a href="{{ route('reports.pdf') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm font-bold">
                Export PDF
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg overflow-x-auto">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-gray-100 italic uppercase tracking-wider">
                            <th class="border p-2">Data Pasien</th>
                            <th class="border p-2">Kunjungan</th>
                            <th class="border p-2">Keluhan & Perawatan</th>
                            <th class="border p-2 text-center">Antrean & Jam</th>
                            <th class="border p-2 text-center">Status & Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $reg)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-2">
                                <div class="font-bold">{{ $reg->user->name }}</div>
                                <div class="text-[10px] text-gray-500">NIK: {{ $reg->user->nik }}</div>
                                <div class="text-[10px] text-blue-600">WA: {{ $reg->no_hp }}</div>
                            </td>

                            <td class="border p-2">
                                <div class="font-semibold">{{ $reg->schedule->doctor->nama_dokter }}</div>
                                <div>{{ \Carbon\Carbon::parse($reg->tgl_pendaftaran)->translatedFormat('d F Y') }}</div>
                            </td>

                            <td class="border p-2">
                                <div class="font-bold text-blue-700 underline">{{ $reg->jenis_perawatan }}</div>
                                <div class="italic text-gray-600">"{{ Str::limit($reg->keluhan, 50) }}"</div>
                            </td>

                            <td class="border p-2 text-center font-bold">
                                <div class="text-lg">#{{ $reg->no_antrean }}</div>
                                <div class="text-[10px] text-gray-500 bg-gray-100 rounded">{{ $reg->estimasi_jam }}</div>
                            </td>

                            <td class="border p-2 text-center">
                                <form action="{{ route('registrations.updateStatus', $reg->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" 
                                        class="text-[10px] p-1 border rounded font-bold uppercase
                                        {{ $reg->status == 'menunggu' ? 'bg-yellow-50 text-yellow-700 border-yellow-200' : '' }}
                                        {{ $reg->status == 'selesai' ? 'bg-green-50 text-green-700 border-green-200' : '' }}
                                        {{ $reg->status == 'batal' ? 'bg-red-50 text-red-700 border-red-200' : '' }}">
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
</x-app-layout>