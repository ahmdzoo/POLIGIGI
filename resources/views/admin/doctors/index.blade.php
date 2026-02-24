<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Data Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-bold">Daftar Dokter</h3>
                    <a href="{{ route('doctors.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Tambah Dokter
                    </a>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama Dokter</th>
                            <th class="border p-2">Spesialis</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
<tbody>
    @foreach($doctors as $index => $doctor)
    <tr class="hover:bg-gray-50">
        <td class="border p-2 text-center">{{ $index + 1 }}</td>
        <td class="border p-2">{{ $doctor->nama_dokter }}</td>
        <td class="border p-2">{{ $doctor->spesialis }}</td>
        <td class="border p-2 text-center">
            <div class="flex justify-center space-x-2">
                <a href="{{ route('doctors.edit', $doctor->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-xs font-bold">
                    Edit
                </a>

                <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dokter ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-xs font-bold">
                        Hapus
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
