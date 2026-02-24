<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk mengatasi error di gambar Anda
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
    ];

    // Relasi ke pengirim
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relasi ke penerima
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}