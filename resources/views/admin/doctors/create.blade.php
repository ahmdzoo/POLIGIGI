<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Dokter Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('doctors.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="nama_dokter" class="block text-gray-700 text-sm font-bold mb-2">Nama Dokter:</label>
                        <input type="text" name="nama_dokter" id="nama_dokter" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nama_dokter') border-red-500 @enderror" placeholder="Contoh: drg. Budi Santoso" value="{{ old('nama_dokter') }}">
                        @error('nama_dokter')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="spesialis" class="block text-gray-700 text-sm font-bold mb-2">Spesialis:</label>
                        <input type="text" name="spesialis" id="spesialis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('spesialis') border-red-500 @enderror" value="Poli Gigi" readonly>
                        @error('spesialis')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan Data
                        </button>
                        <a href="{{ route('doctors.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>