<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    // Tambahkan baris ini
    protected $fillable = [
        'user_id',
        'schedule_id',
        'no_hp',
        'alamat',
        'jenis_kelamin',
        'tempat_tanggal_lahir',
        'keluhan',
        'jenis_perawatan',
        'metode_pembayaran',
        'no_antrean',
        'estimasi_jam',
        'status',
        'tindakan',
        'tgl_pendaftaran',
    ];

    // Tambahkan relasi agar bisa dipanggil di View nanti
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}