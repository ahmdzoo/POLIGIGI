<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        // Melihat riwayat kunjungan pasien yang sedang login
        $registrations = Registration::where('user_id', Auth::id())->with('schedule.doctor')->latest()->get();
        return view('pasien.registrations.index', compact('registrations'));
    }

    public function create()
    {
        // Menampilkan jadwal yang tersedia untuk dipilih
        $schedules = Schedule::with('doctor')->get();
        return view('pasien.registrations.create', compact('schedules'));
    }

    public function store(Request $request)
    {
        // 1. Ambil data jadwal untuk tahu jam mulai dokter
        $schedule = \App\Models\Schedule::findOrFail($request->schedule_id);

        // 2. Hitung nomor antrean otomatis
        $lastAntrean = \App\Models\Registration::where('schedule_id', $request->schedule_id)
            ->where('tgl_pendaftaran', $request->tgl_pendaftaran)
            ->max('no_antrean');

        $noAntrean = $lastAntrean ? $lastAntrean + 1 : 1;

        // 3. Hitung Jam Mulai (Carbon otomatis menangani format H:i:s)
        $jamMulai = \Carbon\Carbon::createFromFormat('H:i:s', $schedule->jam_mulai)->addMinutes(($noAntrean - 1) * 30);

        // 4. Hitung Jam Selesai (Jam Mulai + 30 Menit)
        $jamSelesai = $jamMulai->copy()->addMinutes(30);

        // 5. GABUNGKAN menjadi format rentang (Definisikan variabel ini)
        $rentangWaktu = $jamMulai->format('H:i') . ' - ' . $jamSelesai->format('H:i');

        // 6. Simpan semua data ke database
        \App\Models\Registration::create([
            'user_id' => Auth::id(),
            'schedule_id' => $request->schedule_id,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
            'keluhan' => $request->keluhan,
            'jenis_perawatan' => $request->jenis_perawatan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'tgl_pendaftaran' => $request->tgl_pendaftaran,
            'no_antrean' => $noAntrean,
            'estimasi_jam' => $rentangWaktu, // Variabel sekarang sudah ada
            'status' => 'menunggu',
        ]);

        return redirect()->route('pasien.registrations.index')
            ->with('success', 'Pendaftaran Berhasil! Jadwal Anda: ' . $rentangWaktu . ' WIB');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,selesai,batal',
        ]);

        $registration = Registration::findOrFail($id);
        $registration->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
}