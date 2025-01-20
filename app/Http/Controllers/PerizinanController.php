<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perizinan;
use App\Models\User;

class PerizinanController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil semua data dari tabel perizinan beserta data user yang terkait
        $dataPerizinan = Perizinan::with('user')->get();

        // Ambil parameter 'nama' dari input pencarian
        $nama = $request->input('nama');

        // Mengambil semua data dari tabel perizinan, beserta data user yang terkait
        $dataPerizinan = Perizinan::with('user')
            ->when($nama, function ($query) use ($nama) {
                // Filter berdasarkan nama user
                return $query->whereHas('user', function ($query) use ($nama) {
                    $query->where('name', 'like', '%' . $nama . '%');
                });
            })
            ->paginate(6);
        
        // Mengirim data ke view
        return view('perizinan.index', compact('dataPerizinan'));
    }
    public function create()
    {
        // Ambil semua data user dari tabel users
        $users = User::where('usertype', '!=', 'admin')->limit(5)->get();

        // Tampilkan form input beserta data users untuk dropdown
        return view('perizinan.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'status' => 'required|string',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048', 
        ]);

        // Simpan data perizinan
        $perizinan = new Perizinan();
        $perizinan->user_id = $request->user_id;
        $perizinan->date = $request->date;
        $perizinan->status = $request->status;

        // Simpan foto jika ada file yang di-upload
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->storeAs('products', $foto->hashName(), 'public');
            $perizinan->foto = $fotoPath;
        }

        // Simpan data perizinan ke database
        $perizinan->save();

        return redirect()->back()->with('success', 'Perizinan berhasil disimpan');
    }

    public function show($id)
    {
        $perizinan = Perizinan::findOrFail($id); // Ambil data izin berdasarkan ID
        return view('perizinan.showizin', compact('perizinan')); // Kirim data ke view
    }
    public function destroy($id)
    {
        $perizinan = Perizinan::find($id);

        if ($perizinan) {
            $perizinan->delete();
            return redirect()->route('perizinan.index')->with('success', 'Izin berhasil dihapus');
        } else {
            return redirect()->route('perizinan.index')->with('error', 'Izin tidak ditemukan');
        }
    }

}

