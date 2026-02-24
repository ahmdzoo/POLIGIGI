<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($receiverId = null)
    {
        $users = [];
        // Jika admin, tampilkan daftar pasien yang pernah chat
        if (Auth::user()->role === 'admin') {
            $users = User::where('role', 'pasien')->get();
        } else {
            // Jika pasien, tampilkan admin
            $users = User::where('role', 'admin')->get();
        }

        $messages = [];
        if ($receiverId) {
            $messages = Message::where(function($q) use ($receiverId) {
                $q->where('sender_id', Auth::id())->where('receiver_id', $receiverId);
            })->orWhere(function($q) use ($receiverId) {
                $q->where('sender_id', $receiverId)->where('receiver_id', Auth::id());
            })->orderBy('created_at', 'asc')->get();
        }

        return view('chat.index', compact('users', 'messages', 'receiverId'));
    }

    public function store(Request $request)
    {
        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return back();
    }
}