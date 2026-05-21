<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RegistrationController extends Controller
{
    /**
     * Menampilkan riwayat kunjungan dengan fitur Filter.
     */
    public function index(Request $request)
    {
        $query = Registration::where('user_id', Auth::id())
            ->with('schedule.doctor');

        // 1. Filter Jenis Perawatan (Layanan)
        if ($request->filled('jenis_perawatan')) {
            $query->where('jenis_perawatan', $request->jenis_perawatan);
        }

        // 2. Filter Berdasarkan Rentang Hari (Termasuk 1 Hari)
        if ($request->filled('rentang_hari')) {
            $hari = intval($request->rentang_hari);

            // Menghitung tanggal batas (Hari ini dikurangi X hari)
            $tanggalBatas = \Carbon\Carbon::now()->subDays($hari)->toDateString();

            // Ambil data dari tanggal batas sampai hari ini
            $query->whereDate('tgl_pendaftaran', '>=', $tanggalBatas);
        }

        $registrations = $query->latest('tgl_pendaftaran')->get();

        return view('pasien.registrations.index', compact('registrations'));
    }

    public function create()
    {
        $schedules = Schedule::with('doctor')->get();
        return view('pasien.registrations.create', compact('schedules'));
    }

    public function store(Request $request)
    {
        $schedule = Schedule::findOrFail($request->schedule_id);

        // Konversi format tanggal agar diterima MySQL
        $tanggalDatabase = Carbon::createFromFormat('d/m/Y', $request->tgl_pendaftaran)->format('Y-m-d');

        // Hitung nomor antrean
        $lastAntrean = Registration::where('schedule_id', $request->schedule_id)
            ->where('tgl_pendaftaran', $tanggalDatabase)
            ->max('no_antrean');

        $noAntrean = $lastAntrean ? $lastAntrean + 1 : 1;

        // Hitung Estimasi Jam (Slot 30 menit)
        $jamMulai = Carbon::createFromFormat('H:i:s', $schedule->jam_mulai)->addMinutes(($noAntrean - 1) * 30);
        $jamSelesai = $jamMulai->copy()->addMinutes(30);
        $rentangWaktu = $jamMulai->format('H:i') . ' - ' . $jamSelesai->format('H:i');

        Registration::create([
            'user_id' => Auth::id(),
            'schedule_id' => $request->schedule_id,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
            'keluhan' => $request->keluhan,
            'jenis_perawatan' => $request->jenis_perawatan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'tgl_pendaftaran' => $tanggalDatabase,
            'no_antrean' => $noAntrean,
            'estimasi_jam' => $rentangWaktu,
            'status' => 'menunggu',
        ]);

        // DIUBAH: Diarahkan ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')
            ->with('success', 'Pendaftaran Berhasil! Nomor Antrean Anda adalah #' . $noAntrean . ' (' . $rentangWaktu . ' WIB)');
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