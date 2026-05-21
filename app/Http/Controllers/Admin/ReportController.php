<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Import library PDF

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::with('user', 'schedule.doctor');

        // 1. Filter Berdasarkan Rentang Hari Konsep Baru
        if ($request->filled('rentang_hari')) {
            $hari = intval($request->rentang_hari);
            $tanggalBatas = Carbon::now()->subDays($hari)->toDateString();
            
            $query->whereDate('tgl_pendaftaran', '>=', $tanggalBatas);
        }

        // 2. Filter Berdasarkan Jenis Perawatan (10 Layanan)
        if ($request->filled('jenis_perawatan')) {
            $query->where('jenis_perawatan', $request->jenis_perawatan);
        }

        // FIX: Ubah nama variabel dari $reports menjadi $registrations agar sesuai dengan View Anda
        $registrations = $query->latest('tgl_pendaftaran')->get();

        // Mengirimkan variabel $registrations ke halaman View Laporan
        return view('admin.reports.index', compact('registrations'));
    }
}