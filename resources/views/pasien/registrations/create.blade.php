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

                            <div class="mb-6">
    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 bold">
        Tanggal Periksa 
    </label>
    <div class="relative group">
        <input 
            type="text" {{-- Kita ganti ke text agar format tanggal 02/04/2026 terlihat rapi seperti di gambar --}}
            name="tgl_pendaftaran" 
            value="{{ date('d/m/Y') }}" 
            readonly 
            {{-- Class border-orange-200 dan rounded-2xl disamakan dengan inputan lain --}}
            class="w-full border-2 border-orange-200 rounded-2xl p-4 bg-orange-50/20 text-gray-700 font-bold shadow-sm cursor-not-allowed focus:ring-0 focus:border-orange-200 transition-all appearance-none"
            required
        >
        {{-- Ikon kalender untuk menjaga keseimbangan visual --}}
        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-orange-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
    </div>
    <p class="mt-2 text-[9px] text-orange-500 font-black italic uppercase tracking-widest">
        * Pendaftaran hanya berlaku untuk hari ini
    </p>
</div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-wider mb-1">Jenis Perawatan</label>
                                    <select name="jenis_perawatan" class="w-full border-orange-200 rounded-xl p-3 focus:ring-orange-500 focus:border-orange-500 bg-orange-50/20" required>
                                        <option value="Check Up">Check Up</option>
                                        <option value="Scalling">Scalling</option>
                                        <option value="Tambal Gigi">Tambal Gigi</option>
                                        <option value="Cabut Gigi">Cabut Gigi</option>
                                        <option value="Perawatan Saluran Akar">Perawatan Saluran Akar</option>
                                        <option value="Pasang Behel">Pasang Behel</option>
                                        <option value="Veneer Gigi">Veneer Gigi</option>
                                        <option value="Bleaching Gigi">Bleaching Gigi</option>
                                        <option value="Implan Gigi">Implan Gigi</option>
                                        <option value="Perawatan Gusi">Perawatan Gusi</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-gray-500 uppercase tracking-wider mb-1">Pembayaran</label>
                                    <select name="metode_pembayaran" class="w-full border-orange-200 rounded-xl p-3 focus:ring-orange-500 focus:border-orange-500 bg-orange-50/20" required>
                                        <option value="UMUM">UMUM</option>
                                        <option value="BPJS">BPJS</option>
                                        <option value="ASURANSI">ASURANSI</option>
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