<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight italic">Form Pendaftaran Praktek Poli Gigi</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-lg sm:rounded-lg border-t-4 border-blue-500">
                <form action="{{ route('pasien.registrations.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <h3 class="font-bold text-lg border-b pb-2">Biodata Pasien</h3>
                            
                            <div>
                                <label class="block text-sm font-medium">Nomor WhatsApp/HP</label>
                                <input type="text" name="no_hp" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="08xxx" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Tempat, Tanggal Lahir</label>
                                <input type="text" name="tempat_tanggal_lahir" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Indramayu, 01-01-2000" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Alamat Lengkap</label>
                                <textarea name="alamat" class="w-full border-gray-300 rounded-md shadow-sm" rows="3" required></textarea>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h3 class="font-bold text-lg border-b pb-2">Detail Kunjungan</h3>

                            <div>
                                <label class="block text-sm font-medium">Pilih Dokter & Jadwal</label>
                                <select name="schedule_id" class="w-full border-gray-300 rounded-md shadow-sm" required>
                                    @foreach($schedules as $s)
                                        <option value="{{ $s->id }}">
                                            {{ $s->doctor->nama_dokter }} ({{ $s->hari }} | {{ $s->jam_mulai }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Tanggal Kunjungan</label>
                                <input type="date" name="tgl_pendaftaran" class="w-full border-gray-300 rounded-md shadow-sm" min="{{ date('Y-m-d') }}" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Jenis Perawatan</label>
                                <select name="jenis_perawatan" class="w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="Pemeriksaan Rutin">Pemeriksaan Rutin</option>
                                    <option value="Cabut Gigi">Cabut Gigi</option>
                                    <option value="Tambal Gigi">Tambal Gigi</option>
                                    <option value="Pembersihan Karang (Scaling)">Pembersihan Karang (Scaling)</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Metode Pembayaran</label>
                                <select name="metode_pembayaran" class="w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="Tunai">Tunai / Mandiri</option>
                                    <option value="BPJS">BPJS Kesehatan</option>
                                    <option value="Asuransi Lain">Asuransi Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-red-600">Keluhan Utama</label>
                        <textarea name="keluhan" class="w-full border-gray-300 rounded-md shadow-sm" rows="3" placeholder="Jelaskan sakit yang dirasakan..." required></textarea>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-md transition duration-200">
                            Konfirmasi Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>