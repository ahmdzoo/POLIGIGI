<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Doctor;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        // Eager loading 'doctor' agar tidak berat saat load data
        $schedules = Schedule::with('doctor')->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $doctors = Doctor::all(); // Untuk pilihan di dropdown
        return view('admin.schedules.create', compact('doctors'));
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'kuota' => 'required|integer|min:1',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dibuat.');
    }

    public function edit(Schedule $schedule)
{
    $doctors = Doctor::all(); // Mengambil data dokter untuk dropdown
    return view('admin.schedules.edit', compact('schedule', 'doctors'));    
}

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'doctor_id' => 'required',
            'hari' => 'required|string', // Ubah menjadi string agar bisa menampung "s.d."
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedules.index')->with('success', 'Jadwal praktik berhasil diperbarui!');
    }
}