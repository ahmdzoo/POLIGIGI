<x-guest-layout>
    <div class="flex min-h-screen bg-white overflow-hidden relative">
        
        <div class="w-full lg:w-5/12 flex flex-col justify-center px-12 md:px-20 bg-white z-20 py-10">
            <div class="max-w-md w-full mx-auto lg:mx-0">
                <div class="mb-8">
                    <x-application-logo class="w-16 h-16 fill-current text-orange-600 mb-4" />
                    
                    <h2 class="text-5xl font-black text-gray-800 italic uppercase tracking-tighter leading-none mb-2">
                        DAFTAR<br><span class="text-orange-500">AKUN</span>
                    </h2>
                    <p class="text-[10px] text-gray-400 font-bold mt-2 tracking-[0.3em] uppercase italic">
                        Mulai perjalanan kesehatan gigi anda bersama kami
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="text-[10px] font-black text-orange-600 uppercase tracking-widest ml-1 italic">Nama Lengkap</label>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus 
                            class="block mt-1 w-full bg-orange-50/30 border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl py-3 px-5 text-sm font-bold shadow-sm transition-all" 
                            placeholder="Masukan Nama Lengkap" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-orange-600 uppercase tracking-widest ml-1 italic">Email Address</label>
                        <input id="email" type="email" name="email" :value="old('email')" required 
                            class="block mt-1 w-full bg-orange-50/30 border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl py-3 px-5 text-sm font-bold shadow-sm transition-all" 
                            placeholder="Masukan Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-[10px] font-black text-orange-600 uppercase tracking-widest ml-1 italic">Password</label>
                            <input id="password" type="password" name="password" required 
                                class="block mt-1 w-full bg-orange-50/50 border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl py-3 px-4 text-sm font-bold shadow-sm" placeholder="Masukan Password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>
                        <div>
                            <label class="text-[10px] font-black text-orange-600 uppercase tracking-widest ml-1 italic">Konfirmasi</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required 
                                class="block mt-1 w-full bg-orange-50/50 border-orange-100 focus:border-orange-500 focus:ring-orange-500 rounded-2xl py-3 px-4 text-sm font-bold shadow-sm" placeholder="Konfirmasi Password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-2xl shadow-xl shadow-orange-100 text-xs font-black uppercase tracking-[0.2em] transition-all active:scale-95 transform italic mt-4">
                        BUAT AKUN SEKARANG →
                    </button>

                    <p class="text-center text-[10px] font-bold text-gray-400 mt-6 uppercase tracking-widest italic">
                        SUDAH PUNYA AKUN? 
                        <a href="{{ route('login') }}" class="text-orange-600 font-black italic hover:underline ml-1">
                            MASUK SAJA
                        </a>
                    </p>
                </form>
            </div>
        </div>

        <div class="hidden lg:flex lg:w-7/12 bg-orange-500 relative overflow-hidden items-center justify-center wave-shape z-10 shadow-2xl">
            
            <div class="absolute -right-20 w-[120%] h-[120%] bg-orange-600 rounded-full opacity-30 translate-x-1/4"></div>
            
            <div class="relative z-10 w-[550px] h-[550px] rounded-full border-[20px] border-white/20 p-4 backdrop-blur-sm shadow-2xl">
                <div class="w-full h-full rounded-full overflow-hidden border-4 border-white shadow-2xl bg-white">
                    <img src="{{ asset('images/paomanklinik.jpg') }}" class="w-full h-full object-cover" alt="Klinik Paoman">
                </div>
            </div>

            <div class="absolute bottom-12 right-12 z-20 bg-white/95 backdrop-blur px-6 py-4 rounded-3xl shadow-2xl flex items-center gap-4 border border-orange-100">
                <div class="w-10 h-10 bg-orange-500 rounded-2xl flex items-center justify-center text-white shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <p class="text-[9px] font-black text-orange-600 uppercase tracking-tighter leading-none">LOKASI KAMI</p>
                    <p class="text-xs font-bold text-gray-800 italic uppercase">Paoman, Indramayu</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>