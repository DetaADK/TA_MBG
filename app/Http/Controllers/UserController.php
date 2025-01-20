<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('inputsiswaguru', compact('users')); 
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:users',
            'kelas' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string|in:Laki_laki,Perempuan',
            'alamat' => 'required|string|max:255',
            'usertype' => 'required|string|in:admin,user',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Menyimpan data ke database
        User::create([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'usertype' => $request->usertype,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect dan tampilkan pesan sukses
        return redirect()->route('user.create')->with('success', 'Data berhasil disimpan!');
    }

}


