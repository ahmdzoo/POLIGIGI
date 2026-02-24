<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight italic">Live Chat Klinik Paoman</h2></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-4 h-[500px]">
            <div class="w-1/3 bg-white p-4 shadow rounded-lg overflow-y-auto">
                <h3 class="font-bold border-b pb-2 mb-2">Kontak</h3>
                @foreach($users as $user)
                    <a href="{{ url('/chat/'.$user->id) }}" class="block p-2 hover:bg-gray-100 rounded {{ $receiverId == $user->id ? 'bg-blue-50' : '' }}">
                        {{ $user->name }} <small class="text-gray-500">({{ $user->role }})</small>
                    </a>
                @endforeach
            </div>

            <div class="w-2/3 bg-white shadow rounded-lg flex flex-col">
                <div class="flex-1 p-4 overflow-y-auto bg-gray-50">
                    @forelse($messages as $msg)
                        <div class="mb-4 {{ $msg->sender_id == Auth::id() ? 'text-right' : 'text-left' }}">
                            <div class="inline-block p-2 rounded-lg {{ $msg->sender_id == Auth::id() ? 'bg-blue-500 text-white' : 'bg-gray-300 text-black' }}">
                                {{ $msg->message }}
                            </div>
                            <div class="text-[10px] text-gray-500">{{ $msg->created_at->diffForHumans() }}</div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 mt-10">Pilih kontak untuk memulai percakapan</p>
                    @endforelse
                </div>

                @if($receiverId)
                <form action="{{ route('chat.store') }}" method="POST" class="p-4 border-t flex gap-2">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $receiverId }}">
                    <input type="text" name="message" class="flex-1 border rounded p-2" placeholder="Tulis pesan..." required autofocus>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-bold">Kirim</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>