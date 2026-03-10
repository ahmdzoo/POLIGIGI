<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-orange-600 leading-tight italic">Database Seluruh Pasien</h2>
    </x-slot>

    <div class="py-12 bg-orange-50/20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-orange-100 p-8">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="font-black text-gray-800 text-lg uppercase tracking-tighter italic">Data Master Pasien</h3>
                        <p class="text-[10px] text-gray-400 font-bold uppercase">Total Terdaftar: {{ $patients->count() }} Orang</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="bg-orange-50 text-orange-800 text-[10px] font-black uppercase tracking-widest">
                                <th class="p-4 rounded-l-2xl">NIK & Nama</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Kontak (WhatsApp)</th>
                                <th class="p-4">Alamat</th>
                                <th class="p-4 text-center rounded-r-2xl">Biodata</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)
                            @php $latestReg = $patient->registrations->first(); @endphp
                            <tr class="bg-white hover:bg-orange-50/50 transition-all shadow-sm">
                                <td class="p-4 border-y border-l rounded-l-2xl">
                                    <div class="font-black text-gray-800 uppercase">{{ $patient->name }}</div>
                                    <div class="text-[9px] text-orange-500 font-bold italic tracking-widest">NIK: {{ $patient->nik }}</div>
                                </td>
                                <td class="p-4 border-y text-xs text-gray-500 font-medium italic">{{ $patient->email }}</td>
                                <td class="p-4 border-y font-bold text-gray-700">{{ $latestReg->no_hp ?? '-' }}</td>
                                <td class="p-4 border-y text-[10px] text-gray-400 italic font-medium leading-tight">
                                    {{ Str::limit($latestReg->alamat ?? 'Biodata belum dilengkapi', 60) }}
                                </td>
                                <td class="p-4 border-y border-r rounded-r-2xl text-center">
                                    @if($latestReg)
                                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-[8px] font-black uppercase">Lengkap</span>
                                    @else
                                        <span class="px-3 py-1 bg-gray-100 text-gray-400 rounded-full text-[8px] font-black uppercase">Parsial</span>
                                    @endif
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