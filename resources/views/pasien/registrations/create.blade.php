<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-orange-600 leading-tight italic">
            Pendaftaran Kunjungan Poli Gigi
        </h2>
    </x-slot>

    <div class="py-12 bg-orange-50/30">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl rounded-3xl border border-orange-100">
                <div class="bg-orange-500 p-6 text-white">
                    <h3 class="font-black text-lg uppercase tracking-widest italic">Formulir Rekam Medis Digital</h3>
                    <p class="text-[10px] opacity-80">Pastikan data yang Anda masukkan sesuai dengan KTP dan kondisi saat ini.</p>
                </div>

                <form action="{{ route('pasien.registrations.store') }}" method="POST" class="p-8">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-5">
                            <h4 class="font-black text-gray-800 border-b-2 border-orange-200 pb-2 text-sm flex items-center gap-2">
                                <span class="p-1 bg-orange-100 rounded text-orange-600">01</span> Informasi Biodata
                            </h4>
                            
                            <div>
                                <label class="block text-xs font-black text-gray-500 uppercase tracking-wider mb-1">Nomor WhatsApp</label>
                                <input type="text" name="no_hp" class="w-full border-orange-200 rounded-xl p-3 focus:ring-orange-500 focus:border-orange-500 bg-orange-50/20 shadow-sm" placeholder="Contoh: 081234..." required>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-wider mb-1">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="w-full border-orange-200 rounded-xl p-3 focus:ring-orange-500 focus:border-orange-500 bg-orange-50/20" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-wider mb-1">TTL</label>
                                    <input type="text" name="tempat_tanggal_lahir" class="w-full border-orange-200 rounded-xl p-3 focus:ring-orange-500 focus:border-orange-500 bg-orange-50/20 shadow-sm" placeholder="Indramayu, 01-01-2000" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-black text-gray-500 uppercase tracking-wider mb-1">Alamat Domisili</label>
                                <textarea name="alamat" class="w-full border-orange-200 rounded-xl p-3 focus:ring-orange-500 focus:border-orange-500 bg-orange-50/20" rows="3" required></textarea>
                            </div>
                        </div>

                        <div class="space-y-5">
                            <h4 class="font-black text-gray-800 border-b-2 border-orange-200 pb-2 text-sm flex items-center gap-2">
                                <span class="p-1 bg-orange-100 rounded text-orange-600">02</span> Rencana Kunjungan
                            </h4>

                            <div>
                                <label class="block text-xs font-black text-gray-500 uppercase tracking-wider mb-1">Dokter & Jadwal</label>
                                <select name="schedule_id" class="w-full border-orange-200 rounded-xl p-3 focus:ring-orange-500 focus:border-orange-500 bg-orange-50/20" required>
                                    @foreach($schedules as $s)
                                        <option value="{{ $s->id }}">
                                            {{ $s->doctor->nama_dokter }} ({{ $s->hari }} - {{ $s->jam_mulai }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-black text-gray-500 uppercase tracking-wider mb-1">Tanggal Periksa</label>
                                <input type="date" name="tgl_pendaftaran" class="w-full border-orange-200 rounded-xl p-3 focus:ring-orange-500 focus:border-orange-500 bg-orange-50/20 shadow-sm" min="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-wider mb-1">Jenis Perawatan</label>
                                    <select name="jenis_perawatan" class="w-full border-orange-200 rounded-xl p-3 focus:ring-orange-500 focus:border-orange-500 bg-orange-50/20" required>
                                        <option value="Pemeriksaan Rutin">Pemeriksaan Rutin</option>
                                        <option value="Cabut Gigi">Cabut Gigi</option>
                                        <option value="Tambal Gigi">Tambal Gigi</option>
                                        <option value="Scaling">Scaling</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-wider mb-1">Pembayaran</label>
                                    <select name="metode_pembayaran" class="w-full border-orange-200 rounded-xl p-3 focus:ring-orange-500 focus:border-orange-500 bg-orange-50/20" required>
                                        <option value="Tunai">Tunai</option>
                                        <option value="BPJS">BPJS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <label class="block text-xs font-black text-orange-600 uppercase tracking-widest mb-2">Keluhan Gigi</label>
                        <textarea name="keluhan" class="w-full border-2 border-orange-200 rounded-2xl p-4 focus:ring-orange-500 focus:border-orange-500 bg-orange-50/10 shadow-inner" rows="4" placeholder="Contoh: Gigi belakang berlubang dan nyeri sejak 2 hari yang lalu..." required></textarea>
                    </div>

                    <div class="mt-10">
                        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-black py-4 rounded-2xl shadow-xl shadow-orange-200 transition-all transform hover:scale-[1.01] uppercase tracking-[0.3em] italic text-sm">
                            Kirim Pendaftaran
                        </button>
                        <p class="text-center text-[9px] text-gray-400 mt-4 uppercase font-bold italic tracking-tighter">
                            *Sistem akan memberikan nomor antrean dan estimasi jam secara otomatis setelah Anda klik tombol di atas.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>