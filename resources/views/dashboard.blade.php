<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Edukasi Kesehatan Gigi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-600 text-white p-6 rounded-lg shadow-lg mb-6">
                <h3 class="text-2xl font-bold">Halo, {{ Auth::user()->name }}!</h3>
                <p>Jaga kesehatan gigi Anda dengan membaca artikel edukasi di bawah ini.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($articles as $article)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
                        <div class="p-6">
                            <h4 class="font-bold text-lg mb-2 text-blue-600">{{ $article->judul }}</h4>
                            <p class="text-gray-600 text-sm mb-4">
                                {{ Str::limit($article->konten, 100) }}
                            </p>
                            <button class="mt-auto text-blue-500 font-bold hover:underline text-sm"> Baca Selengkapnya →</button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 bg-white p-10 text-center rounded-lg shadow">
                        <p class="text-gray-500 italic">Belum ada artikel kesehatan saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>