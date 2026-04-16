<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-orange-600 leading-tight italic uppercase tracking-tighter">
            {{ __('Kelola Jadwal Praktik') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-orange-50/20 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r-xl flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="font-bold italic uppercase text-xs">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-2xl rounded-[2.5rem] border border-orange-100 p-8">
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-8 bg-orange-500 rounded-full shadow-lg shadow-orange-200"></div>
                        <h3 class="text-lg font-black text-gray-800 uppercase italic tracking-tighter">Jadwal Operasional Poli Gigi</h3>
                    </div>
                    
                    <a href="{{ route('schedules.create') }}" class="inline-flex items-center px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-black rounded-full transition-all shadow-lg shadow-orange-200 text-xs uppercase tracking-widest active:scale-95">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Jadwal Praktik
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="text-orange-800 text-[10px] font-black uppercase tracking-widest italic opacity-60">
                                <th class="p-4 rounded-l-2xl text-center w-16">No</th>
                                <th class="p-4">Tenaga Medis (Dokter)</th>
                                <th class="p-4">Hari Operasional</th>
                                <th class="p-4 text-center">Jam Operasional</th>
                                <th class="p-4 text-center rounded-r-2xl">Manajemen Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedules as $index => $schedule)
                            <tr class="bg-white hover:bg-orange-50/50 transition-all shadow-sm group">
                                <td class="p-4 border-y border-l rounded-l-2xl text-center font-black text-gray-300 group-hover:text-orange-500 transition-colors">
                                    {{ $index + 1 }}
                                </td>
                                
                                <td class="p-4 border-y border-gray-50">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600 font-black shadow-inner border border-orange-200 uppercase">
                                            {{ substr($schedule->doctor->nama_dokter, 0, 1) }}
                                        </div>
                                        <div class="font-black text-gray-800 uppercase text-xs tracking-tight group-hover:text-orange-600 transition-colors">
                                            {{ $schedule->doctor->nama_dokter }}
                                        </div>
                                    </div>
                                </td>

                                <td class="p-4 border-y border-gray-50">
    <span class="inline-block px-4 py-1 bg-orange-50 text-orange-600 rounded-lg text-[10px] font-black uppercase tracking-tight border border-orange-100 italic shadow-sm">
        {{ $schedule->hari }}
    </span>
</td>

                                <td class="p-4 border-y border-gray-50 text-center">
                                    <div class="inline-flex items-center gap-2 bg-gray-50 px-3 py-1 rounded-full border border-gray-100">
                                        <svg class="w-3 h-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        <span class="text-[10px] font-black text-gray-700 italic">
                                            {{ substr($schedule->jam_mulai, 0, 5) }} - {{ substr($schedule->jam_selesai, 0, 5) }} WIB
                                        </span>
                                    </div>
                                </td>

                                <td class="p-4 border-y border-r rounded-r-2xl border-gray-50 text-center">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="p-2.5 bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white rounded-2xl transition-all shadow-sm border border-amber-100" title="Edit Jadwal">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>

                                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal praktik ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2.5 bg-red-50 text-red-600 hover:bg-red-500 hover:text-white rounded-2xl transition-all shadow-sm border border-red-100" title="Hapus Jadwal">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.134 21H7.866a2 2 0 01-1.996-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($schedules->isEmpty())
                    <div class="text-center py-20 bg-orange-50/30 rounded-[2.5rem] border-4 border-dashed border-orange-100 mt-6">
                        <p class="text-[11px] font-black text-gray-400 uppercase italic tracking-[0.2em]">Belum ada jadwal praktik yang terdaftar</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>