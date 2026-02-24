<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Jadwal Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-bold">Jadwal Praktik Poli Gigi</h3>
                    <a href="{{ route('schedules.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                        + Tambah Jadwal
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-sm">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama Dokter</th>
                            <th class="border p-2">Hari</th>
                            <th class="border p-2">Jam</th>
                            <th class="border p-2">Kuota</th>
                            <th class="border p-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $index => $schedule)
                        <tr class="text-sm hover:bg-gray-50">
                            <td class="border p-2 text-center">{{ $index + 1 }}</td>
                            <td class="border p-2 font-semibold text-blue-600">{{ $schedule->doctor->nama_dokter }}</td>
                            <td class="border p-2">{{ $schedule->hari }}</td>
                            <td class="border p-2">{{ $schedule->jam_mulai }} - {{ $schedule->jam_selesai }}</td>
                            <td class="border p-2 text-center">{{ $schedule->kuota }} Pasien</td>
                            <td class="border p-2 text-center">
                                <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Hapus jadwal ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-xs uppercase">Hapus</button>
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