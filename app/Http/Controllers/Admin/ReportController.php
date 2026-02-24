<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Import library PDF

class ReportController extends Controller
{
    public function index()
    {
        // Menampilkan semua pendaftaran untuk Admin
        $registrations = Registration::with(['user', 'schedule.doctor'])->latest()->get();
        return view('admin.reports.index', compact('registrations'));
    }

    public function downloadPdf()
    {
        $registrations = Registration::with(['user', 'schedule.doctor'])->get();
        
        // Memanggil view khusus untuk format PDF
        $pdf = Pdf::loadView('admin.reports.pdf', compact('registrations'));
        
        // Download file dengan nama tertentu
        return $pdf->download('laporan-pendaftaran-poligigi.pdf');
    }
}