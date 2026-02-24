<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight italic">Data Master Pasien Klinik Paoman</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-blue-600 text-white">
                            <th class="border p-3">NIK</th>
                            <th class="border p-3">Nama Pasien</th>
                            <th class="border p-3">Email</th>
                            <th class="border p-3">No. HP / WA</th>
                            <th class="border p-3">Jenis Kelamin</th>
                            <th class="border p-3">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                        @php
                            // Ambil pendaftaran terakhir untuk mendapatkan biodata terbaru
                            $latestReg = $patient->registrations->first();
                        @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="border p-3 font-mono">{{ $patient->nik }}</td>
                            <td class="border p-3 font-bold uppercase">{{ $patient->name }}</td>
                            <td class="border p-3">{{ $patient->email }}</td>
                            <td class="border p-3">
                                {{ $latestReg->no_hp ?? '-' }}
                            </td>
                            <td class="border p-3 text-center">
                                {{ $latestReg->jenis_kelamin ?? '-' }}
                            </td>
                            <td class="border p-3 text-xs">
                                {{ $latestReg->alamat ?? 'Belum melengkapi biodata pendaftaran' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>