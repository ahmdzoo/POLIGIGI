<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ringkasan Data Klinik Paoman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
                    <div class="text-sm text-gray-500 uppercase font-bold">Total Dokter</div>
                    <div class="text-2xl font-black">{{ \App\Models\Doctor::count() }}</div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500">
                    <div class="text-sm text-gray-500 uppercase font-bold">Total Pasien</div>
                    <div class="text-2xl font-black">{{ \App\Models\User::where('role', 'pasien')->count() }}</div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-yellow-500">
                    <div class="text-sm text-gray-500 uppercase font-bold">Antrean Hari Ini</div>
                    <div class="text-2xl font-black">{{ \App\Models\Registration::whereDate('tgl_pendaftaran', today())->count() }}</div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-red-500">
                    <div class="text-sm text-gray-500 uppercase font-bold">Artikel Edukasi</div>
                    <div class="text-2xl font-black">{{ \App\Models\Article::count() }}</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-lg text-gray-800">Monitoring Pendaftaran Pasien</h3>
                    <span class="text-xs text-gray-500">Update otomatis saat status diubah</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700 uppercase text-[10px] tracking-wider">
                                <th class="p-3 border">Data Pasien (NIK & Kontak)</th>
                                <th class="p-3 border">Dokter & Jadwal</th>
                                <th class="p-3 border">Keluhan & Perawatan</th>
                                <th class="p-3 border text-center">Antrean & Jam</th>
                                <th class="p-3 border text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach(\App\Models\Registration::with(['user', 'schedule.doctor'])->latest()->take(10)->get() as $reg)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="p-3 border">
                                    <div class="font-bold text-gray-900">{{ $reg->user->name }}</div>
                                    <div class="text-[10px] text-gray-500 italic">NIK: {{ $reg->user->nik }}</div>
                                    <div class="text-[10px] text-blue-600 font-medium">WA: {{ $reg->no_hp }}</div>
                                </td>

                                <td class="p-3 border text-xs">
                                    <div class="font-semibold">{{ $reg->schedule->doctor->nama_dokter }}</div>
                                    <div class="text-gray-500">{{ \Carbon\Carbon::parse($reg->tgl_pendaftaran)->translatedFormat('d F Y') }}</div>
                                </td>

                                <td class="p-3 border">
                                    <div class="inline-block px-2 py-0.5 bg-blue-100 text-blue-700 rounded text-[10px] font-bold mb-1 uppercase">
                                        {{ $reg->jenis_perawatan }}
                                    </div>
                                    <div class="text-xs text-gray-600 leading-tight">
                                        <span class="font-bold">Keluhan:</span> {{ Str::limit($reg->keluhan, 40) }}
                                    </div>
                                </td>

                                <td class="p-3 border text-center">
                                    <div class="text-lg font-black text-blue-700">#{{ $reg->no_antrean }}</div>
                                    <div class="text-[10px] font-bold text-gray-500 bg-gray-100 rounded py-0.5">{{ $reg->estimasi_jam }} WIB</div>
                                </td>

                                <td class="p-3 border text-center">
                                    <form action="{{ route('registrations.updateStatus', $reg->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" 
                                            class="text-[10px] font-bold rounded border-gray-300 py-1 px-2 focus:ring-blue-500 
                                            {{ $reg->status == 'menunggu' ? 'bg-yellow-50 text-yellow-700' : '' }}
                                            {{ $reg->status == 'selesai' ? 'bg-green-50 text-green-700' : '' }}
                                            {{ $reg->status == 'batal' ? 'bg-red-50 text-red-700' : '' }}">
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

                @if(\App\Models\Registration::count() == 0)
                    <div class="text-center py-10 text-gray-500 italic">
                        Belum ada data pendaftaran pasien masuk.
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>