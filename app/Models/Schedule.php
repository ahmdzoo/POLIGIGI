<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['doctor_id', 'hari', 'jam_mulai', 'jam_selesai', 'kuota'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}