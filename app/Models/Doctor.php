<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['nama_dokter', 'spesialis'];

    public function schedules()
{
    return $this->hasMany(Schedule::class);
}
}