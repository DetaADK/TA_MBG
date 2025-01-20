<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Perizinan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AttendanceController extends Controller
{
    public function dashboard(Request $request)
    {
        $users = User::with('attendance');
    
        // Jika yang login adalah admin, tampilkan semua user dengan userType 'user' selain admin itu sendiri
        if (Auth::user()->usertype == 'admin') {
            // Admin tidak melihat dirinya sendiri, paginate hasil query
            $users = $users->where('usertype', 'user')->where('id', '!=', Auth::id());
        } else {
            // Jika yang login adalah user biasa, hanya tampilkan data dirinya sendiri
            $users = $users->where('id', Auth::id());
        }
    
        $users = $users->paginate(6);
    
        $users->getCollection()->transform(function ($user) {
            $user->jumlahIzin = $user->attendance->whereIn('status', ['izin', 'Izin', 'IZIN'])->count();
            $user->jumlahSakit = $user->attendance->whereIn('status', ['sakit', 'Sakit', 'SAKIT'])->count();
            $user->jumlahAlpha = $user->attendance->where('status', 'Tidak Hadir')->count();
    
            return $user;
        });
    
        return view('dashboard', compact('users'));
    }

    public function index(Request $request)
    {
        // Ambil filter dari request
        $nameStartsWith = $request->input('name_starts_with', ''); // Filter kelas
        $date = $request->input('date', ''); // Filter tanggal
    
        // Ambil daftar kelas yang unik dari tabel users
        $kelasList = User::where('usertype', 'user') // Pastikan hanya user yang diambil
                        ->select('kelas')
                        ->distinct()
                        ->pluck('kelas');
    
        // Mulai query untuk pengguna
        $query = User::with('attendance');
    
        // Filter kelas jika ada
        if ($nameStartsWith) {
            $query->where('kelas', 'like', $nameStartsWith . '%');
        }
    
        // Urutkan nama pengguna berdasarkan abjad
        $query->orderBy('name', 'asc'); // Mengurutkan berdasarkan kolom 'name' secara abjad (A-Z)
    
        // Dapatkan hasil query
        $users = $query->get();
    
        // Filter tanggal di level PHP jika diperlukan
        if ($date) {
            // Filter hasil absensi berdasarkan tanggal yang dipilih
            foreach ($users as $user) {
                $user->attendance = $user->attendance->filter(function ($attendance) use ($date) {
                    return $attendance->date == $date;
                });
            }
        }
    
        // Kirim data ke view
        return view('tabel', compact('users', 'kelasList'));
    }    

    public function create(Request $request)
    {
        // Dapatkan daftar kelas yang tersedia dari tabel users
        $kelasList = User::where('usertype', 'user')->select('kelas')->distinct()->pluck('kelas');
                
        // Filter siswa berdasarkan kelas yang dipilih
        $kelas = $request->input('kelas');
                
        // Jika kelas dipilih, tampilkan siswa, jika tidak biarkan kosong
        if ($kelas) {
        $students = User::where('usertype', 'user')->where('kelas', $kelas)->get();
        } else {
            $students = [];
        }
                
        return view('inputabsensi', compact('students', 'kelasList'));
    }
        

    // Menyimpan data absensi
    public function store(Request $request)
    {
        // Loop untuk setiap siswa yang datanya dikirimkan
        foreach ($request->input('attendance') as $studentId => $attendanceData) {
            // Buat atau update data absensi berdasarkan user_id dan tanggal
            Attendance::updateOrCreate(
                ['user_id' => $studentId, 'date' => $attendanceData['date']],
                ['status' => $attendanceData['status']]
            );
        }

        return redirect()->back()->with('success', 'Absensi berhasil disimpan!');
    }
    public function pindahkanFoto($id)
    {
        $perizinan = Perizinan::find($id);

        if ($perizinan) {
            // Path lama
            $pathLama = 'perizinan/' . $perizinan->foto;

            // Ambil nama file saja (tanpa path) dari $perizinan->foto
            $namaFile = basename($perizinan->foto);

            // Path baru hanya untuk produk
            $pathBaru = 'products/' . $namaFile; // Menyimpan ke folder products

            // Pindahkan file jika ada
            if (Storage::exists($pathLama)) {
                Storage::move($pathLama, $pathBaru);
            }

            // Pastikan untuk memberikan nilai untuk status
            $attendance = Attendance::firstOrCreate(
                [
                    'user_id' => $perizinan->user_id,
                    'date' => $perizinan->date
                ],
                [
                    'foto' => $pathBaru,
                    'status' => $perizinan->status,
                ]
            );

            // Jika attendance sudah ada, update kolom foto dan status
            if (!$attendance->wasRecentlyCreated) {
                $attendance->foto = $pathBaru;
                $attendance->status = $perizinan->status; 
                $attendance->save();
            }

            return redirect()->back()->with('success', 'Foto dan status berhasil dipindahkan ke tabel attendance');
        } else {
            return redirect()->back()->with('error', 'Data perizinan tidak ditemukan');
        }
    }

    public function showsiswa($id, Request $request)
{
    // Cari data siswa berdasarkan ID
    $users = User::findOrFail($id);

    // Ambil bulan dan tahun dari query string (default ke bulan dan tahun saat ini)
    $month = $request->input('month', date('m'));  
    $year = $request->input('year', date('Y'));   

    // Ambil data absensi berdasarkan ID siswa, bulan, dan tahun
    $attendance = Attendance::where('user_id', $id)
                            ->whereYear('date', $year)
                            ->whereMonth('date', $month)
                            ->get();

    return view('showsiswa', compact('attendance', 'users', 'month', 'year'));
}
    public function show($id)
    {
        // Cari data absensi berdasarkan ID
        $attendance = Attendance::with('user')->findOrFail($id);

        // Kirim data ke view
        return view('show', compact('attendance'));
    }
}


