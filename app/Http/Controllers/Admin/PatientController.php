<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        // Mengambil user dengan role pasien, beserta data registrasi terakhirnya
        $patients = User::where('role', 'pasien')
            ->with([
                'registrations' => function ($query) {
                    $query->latest();
                }
            ])
            ->get();

        return view('admin.patients.index', compact('patients'));
    }
}