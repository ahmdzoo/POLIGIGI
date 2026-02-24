<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Dokter: {{ $doctor->nama_dokter }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
                    @csrf
                    @method('PUT') 
                    
                    <div class="mb-4">
                        <label class="block font-bold">Nama Dokter:</label>
                        <input type="text" name="nama_dokter" value="{{ $doctor->nama_dokter }}" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold">Spesialis:</label>
                        <input type="text" name="spesialis" value="{{ $doctor->spesialis }}" class="w-full border rounded p-2" readonly>
                    </div>

                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
                    <a href="{{ route('doctors.index') }}" class="ml-2 text-gray-600">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>