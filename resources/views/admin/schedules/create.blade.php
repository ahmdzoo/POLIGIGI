<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Jadwal Dokter</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <form action="{{ route('schedules.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-bold">Pilih Dokter:</label>
                        <select name="doctor_id" class="w-full border rounded p-2">
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->nama_dokter }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold">Hari:</label>
                        <select name="hari" class="w-full border rounded p-2">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-bold">Jam Mulai:</label>
                            <input type="time" name="jam_mulai" class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="block font-bold">Jam Selesai:</label>
                            <input type="time" name="jam_selesai" class="w-full border rounded p-2">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold">Kuota Pasien:</label>
                        <input type="number" name="kuota" value="20" class="w-full border rounded p-2">
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Jadwal</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>