<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-orange-600 leading-tight italic uppercase tracking-tighter">
            {{ __('Edit Jadwal Praktik') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-orange-50/20 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl rounded-[2.5rem] border border-orange-100 p-10">
                
                <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-6">
                        <label class="block text-[10px] font-black text-orange-500 uppercase tracking-[0.2em] mb-3 ml-1 italic">Tenaga Medis / Dokter</label>
                        <select name="doctor_id" class="w-full border-2 border-orange-50 rounded-2xl p-4 text-xs font-bold text-gray-700 bg-orange-50/30 focus:border-orange-500 focus:ring-0 italic appearance-none">
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ $schedule->doctor_id == $doctor->id ? 'selected' : '' }}>
                                    {{ $doctor->nama_dokter }}
                                </option>
                            @endforeach
                        </select>
                    </div>

<div class="mb-6">
    <label class="block text-[10px] font-black text-orange-500 uppercase tracking-[0.2em] mb-3 ml-1 italic">Hari Operasional (Contoh: Senin s.d. Sabtu)</label>
    <input type="text" name="hari" 
        value="{{ old('hari', $schedule->hari) }}" 
        placeholder="Contoh: Senin s.d. Sabtu"
        class="w-full border-2 border-orange-50 rounded-2xl p-4 text-xs font-bold text-gray-700 bg-orange-50/30 focus:border-orange-500 focus:ring-0 shadow-inner italic">
    @error('hari')
        <p class="text-red-500 text-[10px] mt-2 font-bold uppercase italic">{{ $message }}</p>
    @enderror
</div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                        <div>
                            <label class="block text-[10px] font-black text-orange-500 uppercase tracking-[0.2em] mb-3 ml-1 italic">Jam Mulai</label>
                            <input type="time" name="jam_mulai" value="{{ old('jam_mulai', substr($schedule->jam_mulai, 0, 5)) }}" class="w-full border-2 border-orange-50 rounded-2xl p-4 text-xs font-bold text-gray-700 bg-orange-50/30 focus:border-orange-500 focus:ring-0 shadow-inner">
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-orange-500 uppercase tracking-[0.2em] mb-3 ml-1 italic">Jam Selesai</label>
                            <input type="time" name="jam_selesai" value="{{ old('jam_selesai', substr($schedule->jam_selesai, 0, 5)) }}" class="w-full border-2 border-orange-50 rounded-2xl p-4 text-xs font-bold text-gray-700 bg-orange-50/30 focus:border-orange-500 focus:ring-0 shadow-inner">
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="flex-1 inline-flex items-center justify-center px-8 py-4 bg-orange-500 hover:bg-orange-600 text-white text-[11px] font-black rounded-2xl transition-all shadow-xl shadow-orange-100 uppercase tracking-widest active:scale-95 italic">
                            Simpan Perubahan Jadwal
                        </button>
                        
                        <a href="{{ route('schedules.index') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-500 text-[11px] font-black rounded-2xl transition-all uppercase tracking-widest italic">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>