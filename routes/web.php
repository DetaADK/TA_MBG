<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('attendance/{id}', [AttendanceController::class, 'show'])->name('show');
    Route::post('/perizinan/{id}/pindahkan-foto', [AttendanceController::class, 'pindahkanFoto'])->name('perizinan.pindahkanFoto');

    Route::get('/perizinan', [PerizinanController::class, 'index'])->name('perizinan.index');
    Route::get('/perizinan/create', [PerizinanController::class, 'create'])->name('perizinan.create');
    Route::post('/perizinan/store', [PerizinanController::class, 'store'])->name('perizinan.store');
    Route::get('perizinan/{id}', [PerizinanController::class, 'show'])->name('perizinan.showizin');
    Route::delete('/perizinan/{id}', [PerizinanController::class, 'destroy'])->name('perizinan.destroy');

    Route::get('/user', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

    Route::get('/daftarsiswa', [UserController::class, 'index'])->name('daftarsiswa');
    Route::get('/absensi/{id}', [AttendanceController::class, 'showsiswa'])->name('showsiswa');
});


Route::get('/', function () {
    return view('awalam');
});

Route::get('/dashboard', [AttendanceController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
