<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Import library PDF
use Carbon\Carbon; // Pastikan Carbon di-import di sini agar filter rentang hari & tanggal tidak error

class ReportController extends Controller
{
    /**
     * Menampilkan halaman analisis dan laporan kunjungan pasien.
     */
    public function index(Request $request)
    {
        $query = Registration::with('user', 'schedule.doctor');

        // 1. Filter Berdasarkan Rentang Hari Konsep Baru
        if ($request->filled('rentang_hari')) {
            $hari = intval($request->rentang_hari);
            $tanggalBatas = Carbon::now()->subDays($hari)->toDateString();
            
            $query->whereDate('tgl_pendaftaran', '>=', $tanggalBatas);
        }

        // 2. Filter Berdasarkan Jenis Perawatan (10 Layanan Lengkap Klinik Paoman)
        if ($request->filled('jenis_perawatan')) {
            $query->where('jenis_perawatan', $request->jenis_perawatan);
        }

        // Mengambil data dengan urutan pendaftaran terbaru dan menggunakan nama variabel $registrations
        $registrations = $query->latest('tgl_pendaftaran')->get();

        // Mengirimkan variabel $registrations ke halaman View Laporan
        return view('admin.reports.index', compact('registrations'));
    }

    /**
     * Fitur tambahan jika Anda memerlukan fungsi Export PDF yang sinkron dengan filter saat ini.
     */
    public function exportPdf(Request $request)
    {
        $query = Registration::with('user', 'schedule.doctor');

        if ($request->filled('rentang_hari')) {
            $hari = intval($request->rentang_hari);
            $tanggalBatas = Carbon::now()->subDays($hari)->toDateString();
            $query->whereDate('tgl_pendaftaran', '>=', $tanggalBatas);
        }

        if ($request->filled('jenis_perawatan')) {
            $query->where('jenis_perawatan', $request->jenis_perawatan);
        }

        $registrations = $query->latest('tgl_pendaftaran')->get();

        // Mengarahkan ke file view khusus cetak PDF laporan Anda
        $pdf = Pdf::loadView('admin.reports.pdf', compact('registrations'));
        
        return $pdf->download('Laporan-Kunjungan-Klinik-Paoman.pdf');
    }
}