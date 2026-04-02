<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Pasien\RegistrationController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\ChatController;
use App\Models\Article;
use App\Http\Controllers\Admin\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PatientController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Jika admin, arahkan ke route admin.dashboard
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    // Jika pasien, tampilkan view dashboard dengan artikel
    $articles = Article::latest()->get();
    return view('dashboard', compact('articles'));
})->middleware(['auth', 'verified'])->name('dashboard');

// --- KELOMPOK ROUTE ADMIN ---
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // 2. Tambahkan baris ini di dalam grup admin
    Route::resource('admin/doctors', DoctorController::class)->names([
        'index' => 'doctors.index',
        'create' => 'doctors.create',
        'store' => 'doctors.store',
        'edit' => 'doctors.edit',
        'update' => 'doctors.update',
        'destroy' => 'doctors.destroy',
    ]);
    
    Route::resource('admin/schedules', ScheduleController::class)->names('schedules');
    Route::resource('admin/articles', ArticleController::class)->names('articles');
    Route::get('/admin/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/admin/reports/pdf', [ReportController::class, 'downloadPdf'])->name('reports.pdf');
    Route::get('/admin/patients', [PatientController::class, 'index'])->name('patients.index');
    Route::patch('/admin/registrations/{id}/status', [RegistrationController::class, 'updateStatus'])->name('registrations.updateStatus');
    
});

// --- KELOMPOK ROUTE PASIEN ---
// Di dalam grup role:pasien
Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/pasien/dashboard', function () {
        return view('dashboard'); // Sementara pakai dashboard default
    })->name('pasien.dashboard');

    // Route Pendaftaran
    Route::get('/pasien/registrations', [RegistrationController::class, 'index'])->name('pasien.registrations.index');
    Route::get('/pasien/registrations/create', [RegistrationController::class, 'create'])->name('pasien.registrations.create');
    Route::post('/pasien/registrations', [RegistrationController::class, 'store'])->name('pasien.registrations.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/chat/{receiverId?}', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');
});

// Route untuk melihat detail artikel (bisa diakses Pasien & Admin)
Route::get('/articles/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'show'])->name('articles.show');

Route::post('/articles/{article}/favorite', [ArticleController::class, 'toggleFavorite'])->name('articles.favorite');

require __DIR__ . '/auth.php';